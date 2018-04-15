<?php


namespace App\Containers\Eta\ApiTask;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Eta\Models\Zone_type;
use App\Containers\Types\Models\Types;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Cache;


/**
 * Class ApiEta
 * @package App\Containers\eta\ApiTask
 */
class ApiEta
{
     private $extraTimeCharge=null;

     private $applyOn=-1;

    /**
     * @param $data
     * @param $custom_parameter
     */
    public function run($data, $custom_parameter)
    {



        $unitArray = array('miles','kilometer');



        if($zone_type = Zone_type::leftJoin('zone', 'zone.id','zone_type.zone_id')->where('zone_type.id',$data['request']->type_id)->leftJoin('zone_peaktime', function ($join) {


            $join->on('zone_peaktime.zone_id', '=', 'zone_type.zone_id')->where("zone_peaktime.peaktime_start","<",date('H:i:s'))->where("zone_peaktime.peaktime_end",">",date('H:i:s'))->orwhere("zone_peaktime.nighttime_start","<",date('H:i:s'))->where("zone_peaktime.nighttime_end",">",date('H:i:s'));

        })->first())
        {


            $helper = new ApiHelper();
            $distance_matrix= $helper->get_distance_matrix($data['request']->olat,$data['request']->olng,$data['request']->dlat,$data['request']->dlng);
            if($distance_matrix->status =="OK")
            {



                $this->getextraTimeCharge($zone_type);


                $distance = $this->find_distance($distance_matrix);




                if($zone_type->unit == 0)
                {
                    $distance = ApiHelper::kilometer_to_miles($distance);
                    $base_distance = ApiHelper::kilometer_to_miles($zone_type->base_distance);
                }
                else
                {
                    $base_distance = $zone_type->base_distance;
                }



                $time = round($distance_matrix->rows[0]->elements[0]->duration->value/60);

                $base_price = $this->applyextraTimeCharge($zone_type->base_price,1);

                $price_per_distance = $this->applyextraTimeCharge($zone_type->price_per_distance,2);

                if($base_distance < $distance)
                {
                    $balance_distance = $distance-$base_distance;
                    $distance_price = $balance_distance * $price_per_distance;
                }
                else{
                    $distance_price = 0;
                }

                $time = round($distance_matrix->rows[0]->elements[0]->duration->value /60);
                $time_price = $time * $zone_type->price_per_time;

                $ride_total = $base_price + $distance_price + $time_price;

                $taxesnTotal = $this->calTax($ride_total);


                $type_id = $zone_type->type_id;

                $typeTable = Types::select('id','name')->where('id',$zone_type->type_id)->first();


                $type_name = $typeTable->name;

                $unitWithLang = trans('localization::lang_view.'.$unitArray[$zone_type->unit]);

                $obj = new \stdClass();
                $obj->message="Eta_For_Trip";
                $obj->distance=$distance;
                $obj->time=$time;
                $obj->base_distance=$base_distance;
                $obj->base_price= $base_price;
                $obj->price_per_distance= $price_per_distance;
                $obj->price_per_time= $zone_type->price_per_time;
                $obj->distance_price= $distance_price;
                $obj->time_price= $time_price;
                $obj->ride_fare = $this->applyextraTimeCharge($ride_total,3);
                $obj->tax_amount = $taxesnTotal['tax_amount'];
                $obj->tax = $taxesnTotal['tax'];
                $obj->total= $taxesnTotal['total'];
                $obj->currency = $zone_type->currency_symbol;
                $obj->type_id = $type_id;
                $obj->type_name = $type_name;

                $obj->unit     = $zone_type->unit;
                $obj->unit_in_words_without_lang = $unitArray[$zone_type->unit];
                $obj->unit_in_words = $unitWithLang;
                $data['response']=$obj;
                return $data;


            }
            else
            {
                throw (new CommonException())->setValue('719',trans('localization::errors.719'));
            }

        }
        else
        {
            throw (new CommonException())->setValue('720',trans('localization::errors.720'));
        }
    }


    public function applyextraTimeCharge($amount,$type)
    {
        if($this->applyOn == $type)
        {
            return ($amount*($this->extraTimeCharge/100))+$amount;
        }
        return $amount;
    }

    public function calTax($ride_total)
    {
        $tax = GetConfigs::getConfigs('service_tax');
        $tax_amount = ($ride_total*($tax/100));
        $total = $ride_total + $tax_amount;
        return array('tax_amount' => $tax_amount,"total" => $total,'tax' => $tax);
    }

    public function getextraTimeCharge($zone_type)
    {


        if($zone_type->nighttime == 1)
        {

            if ($zone_type->nighttime_start < date('H:i:s') && $zone_type->nighttime_end > date('H:i:s')) {
                $this->extraTimeCharge = $zone_type->nighttime_value;
                $this->applyOn = $zone_type->night_apply_on;

            }
        }

        if($zone_type->peaktime == 1)
        {

            if($zone_type->peaktime_start < date('H:i:s') && $zone_type->peaktime_end > date('H:i:s'))
            {
                $this->extraTimeCharge = $zone_type->peaktime_value;
                $this->applyOn=$zone_type->peak_apply_on;

            }
        }
    }


    public function find_distance($distance_matrix)
    {

        if($distance_matrix->rows[0]->elements[0]->status != "ZERO_RESULTS")
        {
            if(GetConfigs::getConfigs('default_distance_unit') == 1)
            {
                $distance = $distance_matrix->rows[0]->elements[0]->distance->value * 0.00062137;
            }
            else{
                $distance = $distance_matrix->rows[0]->elements[0]->distance->value / 1000;
            }
            return round($distance,2);
        }
        else{
            throw (new CommonException())->setValue('728',trans('localization::errors.728'));
        }

    }



}
