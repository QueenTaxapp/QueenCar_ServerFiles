<?php

namespace App\Containers\Zone\UI\WEB\Controllers;

use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Webtasks\Message;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Currency\Models\CommonCurrencyModel;
use App\Containers\Types\Models\Types;
use App\Containers\Zone\Models\ZoneBoundModel;
use App\Containers\Zone\Models\ZoneModel;
use App\Containers\Zone\Models\ZonePeakModel;
use App\Containers\Zone\Models\ZoneTypeModel;
use App\Containers\Zone\Models\RequestPlaceModel;
use App\Containers\Zone\UI\WEB\Requests\ZoneAddRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use App\Containers\Zone\Models\CurrencyModel;

/**
 * Class Controller
 * @package App\Containers\Admin\UI\WEB\Controllers
 */
class Controller extends WebController
{


    /**
     *
     */
    public function heatMapView(Request $request)
    {
        $page = "heat_module";

        $title = trans('localization::lang_view.heat_map');

        $request_zone = RequestPlaceModel::leftJoin('request','request_place.request_id','=','request.id')
            ->join('Drivers','request.driver_id','=','Drivers.id')
            ->select('request_place.id','request_place.pick_latitude','request_place.pick_longitude')
            ->orderBy('request_place.id',"DESC");


        $reterive_key = ApiHelper::reterive_key();


        if($reterive_key != 0)
        {
            $request_zone = $request_zone->where('Drivers.admin_reference',$reterive_key);
        }

        $request_zone = $request_zone->limit(500)->get();

        //echo "<pre>";print_r($request_zone);die();

        return view('zone::Heatmap',['request'=>$request,'request_zone'=>$request_zone,'page'=>$page,'title'=>$title]);

    }


    public function zoneView(Request $request)
    {
        $page = "zone_module";
        $title = trans('localization::lang_view.zone_view');
        $paginate = GetConfigs::getConfigs('paginate');

        $zone = ZoneModel::select('*');

        $reterive_key = ApiHelper::reterive_key();

        if($reterive_key != 0)
        {
            $zone = $zone->where('admin_reference', $reterive_key);
        }

        $zone = $zone->orderBy('id','desc')->paginate($paginate);

        return view('zone::ZoneView',['request'=>$request,'result'=>$zone,'page'=>$page,'title'=>$title]);

    }


    public function zoneAdd(Request $request)
    {
        $zone_admins = AdminModel::where('role',99999)->where('is_active',1)->get();

        $reterive_key = ApiHelper::reterive_key();

        if($reterive_key != 0)
        {
            $zone_admin_key = $reterive_key;

        }else{
            $zone_admin_key = 0;
        }

        $currency = CommonCurrencyModel::where('status',1)->get();

        $title = trans('localization::lang_view.zone');
        return view('zone::ZoneAdd',['zone_admins' => $zone_admins, 'currency' => $currency, 'zone_admin_key' => $zone_admin_key,'page'=>"zone_module",'title'=>$title]);


    }

    /**
     *
     */
    public function zoneSave(ZoneAddRequest $request)
    {


        $input = $request->datas;
        $name = $request->name;
        $zoneAdmin = $request->zoneAdmin;
        $unit = $request->unit;

        $currency = explode(" ",$request->currency);

        $currencySymbol = $currency[1];
        $currencyId = $currency[0];

        $zone = new ZoneModel();
        $zone->name = $name;
        $zone->unit = $unit;
        $zone->currency_symbol = $currencySymbol;
        $zone->currency = $currencyId;

        $zone->admin_reference = $zoneAdmin;
        $zone->is_active = 1;
        $zone->save();

        foreach($input as $key => $value){
            $zone_bound = new ZoneBoundModel();

            $zone_bound->zone_id = $zone->id;
            $zone_bound->north = $value[0];
            $zone_bound->east = $value[1];
            $zone_bound->south = $value[2];
            $zone_bound->west = $value[3];
            $zone_bound->save();

        }

        $result= array('success'=>"TRUE",'message'=>trans('localization::errors.zone_added_successfully'));

        $request->session()->flash('success', $result);

        return Redirect::to("/admin/zone/view");

    }

    public function zoneDelete(Request $request)
    {

        $zone = ZoneModel::where('id',$request->id)->delete();

        $zone_array = array('success'=>"TRUE",'message'=>trans('localization::errors.zone_deleted_successfully'));
        $request->session()->flash('success', $zone_array);

        return Redirect::to("/admin/zone/view");

    }

    public function zoneCurrencyEdit(Request $request)
    {

        $zone = ZoneModel::where('id',$request->id)->first();

        $currency = CommonCurrencyModel::where('status',1)->get();

        $title = trans('localization::lang_view.zone');

        return view('zone::ZoneCurrencyEdit',[ 'request' => $request ,'currency' => $currency, 'zone' => $zone,'page'=>"zone_module",'title'=>$title]);

    }

    public function zoneCurrencyUpdate(ZoneAddRequest $request)
    {
        //echo "<pre>";print_r($request->all());die();

        $currency = explode(" ",$request->currency);

        $currencySymbol = $currency[1];
        $currencyId = $currency[0];

        $zoneName = $request->name;
        $unit = $request->unit;
        $zone = ZoneModel::where('id',$request->id)->first();

        $zone->currency_symbol = $currencySymbol;
        $zone->currency = $currencyId;
        $zone->name = $zoneName;
        $zone->unit = $unit;
        $zone->save();

        $zoneType = ZoneTypeModel::where('zone_id',$request->id)->update(['currency'=>$currencySymbol,'currency_id'=>$currencyId]);


        $zone_array = array('success'=>"TRUE",'message'=>trans('localization::errors.zone_currency_changed_successfully'));
        $request->session()->flash('success', $zone_array);

        return Redirect::to("/admin/zone/view");

    }

    public function zoneStatusToggle(Request $request){

        $zone = ZoneModel::where('id',$request->id)->first();


        $old_state=$zone->is_active;

        if($old_state==0){

            $zone->is_active=1;

            $zone_array = array('success'=>"TRUE",'message'=>trans('localization::errors.zone_active_successfully'));
        }
        elseif($old_state==1)
        {
            $zone->is_active=0;

            $zone_array = array('success'=>"TRUE",'message'=>trans('localization::errors.zone_inactive_successfully'));
        }
        $zone->save();

        $request->session()->flash('success', $zone_array);

        return Redirect::to("/admin/zone/view");

    }


    public function zoneTypeView(Request $request)
    {
        $title = trans('localization::lang_view.zone_types_view');

        $paginate = GetConfigs::getConfigs('paginate');

        $zoneTypes = ZoneTypeModel::where('zone_id',$request->id)->paginate($paginate);

        $types = Types::select('*')->get();

        return view('zone::ZoneTypeView',['request'=>$request,'result'=>$zoneTypes,'types'=>$types ,'page'=>"zone_module",'title'=>$title]);


    }

    public function zoneTypeAdd(Request $request)
    {
        $title = trans('localization::lang_view.zone_types_add');

        $types = Types::select('*');//->get();

        $zone_admin = ZoneModel::where('zone.id',$request->id)->first();



        $array = array('miles','kilometer');
        $value = $array[$zone_admin->unit];
        $unit = trans('localization::lang_view.'.$value);


        $reterive_key = ApiHelper::reterive_key();

        if($reterive_key != 0)
        {
            $types = $types->where('admin_reference',$reterive_key);

        }else{

            $types = $types->where('admin_reference',$zone_admin->admin_reference);
        }

        $types= $types->get();


        $currency = $zone_admin->currency;


        //echo "<pre>";print_r($types);die();

        /* $types = Types::join('zone_type','Types.id','=','zone_type.type_id')->select('Types.*','zone_type.*')
             ->where('zone_type.zone_id',$request->id)->get();
         echo "<pre>";print_r($types);die();*/

        return view('zone::ZoneTypeAdd',['request'=>$request,'currency'=>$currency,'types'=>$types,'page'=>"zone_module",'title'=>$title,'unit'=>$unit]);

    }


    public function zoneTypeSave(Request $request)
    {
        //echo "<pre>";print_r($request->all());die();

        $zone = ZoneModel::where('id',$request->id)->first();

        $currencySymbol = $zone->currency_symbol;
        $currencyId = $zone->currency;


        if(count($request->payment_type)==3)
        {
            $payment_type = "all";
        }
        else
        {
            $payment_type = implode(",",$request->payment_type);
        }


        $zoneTypes = ZoneTypeModel::where('zone_id',$request->id)->where('type_id',$request->typeName)->get();

        if(count($zoneTypes) > 0){

            throw new ValidationException((new Message()),redirect()->to('admin/zone/typeAdd/'.$request->id)
                ->withErrors([trans('localization::errors.type_already_exist')], 'default'));

        }
        else{
            $zoneTypes = new ZoneTypeModel();

            $zoneTypes->zone_id = $request->id;
            $zoneTypes->type_id = $request->typeName;
            $zoneTypes->base_price = $request->base_price;
            $zoneTypes->base_distance = $request->base_distance;
            $zoneTypes->price_per_distance = $request->price_per_distance;
            $zoneTypes->price_per_time = $request->price_per_time;
            $zoneTypes->waiting_charge = $request->waiting_charge;
            $zoneTypes->payment_type = $payment_type;
            $zoneTypes->is_active = 1;
            $zoneTypes->show_bill = $request->show_bill;
            $zoneTypes->currency = $currencySymbol;
            $zoneTypes->currency_id = $currencyId;


            $zoneTypes->save();


        }

        $zoneType_array = array('success'=>"TRUE",'message'=>trans('localization::errors.zone_type_added_successfully'));
        $request->session()->flash('success', $zoneType_array);

        return Redirect::to("/admin/zone/typeView/".$request->id);

    }


    public function zoneTypeEdit(Request $request)
    {
        //echo "<pre>";print_r($request->zone_id);die();

        $title = trans('localization::lang_view.zone_types_edit');

        $types = Types::select('*')->get();

        $zoneTypes = ZoneTypeModel::leftjoin('zone','zone.id','=','zone_type.zone_id')
                                    ->select('zone_type.*','zone.unit')
                                    ->where('zone_type.id',$request->id)
                                    ->first();


        $array = array('miles','kilometer');
        $value = $array[$zoneTypes->unit];
        $unit = trans('localization::lang_view.'.$value);


        $currency = CommonCurrencyModel::where('status',1)->get();


        return view('zone::ZoneTypeEdit',['request'=>$request,'currency'=>$currency,'types'=>$types,'zoneTypes'=>$zoneTypes,'page'=>"zone_module",'title'=>$title,'unit'=>$unit]);

    }

    public function zoneTypeUpdate(Request $request)
    {



        if(count($request->payment_type)==3){
            $payment_type = "all";
        }else{
            $payment_type = implode(",",$request->payment_type);
        }


        $zoneTypes = ZoneTypeModel::where('id',$request->id)->first();

            $zone = ZoneModel::where('id',$zoneTypes->zone_id)->first();

            $currencySymbol = $zone->currency_symbol;
            $currencyId = $zone->currency;

            $zoneTypes->base_price = $request->base_price;
            $zoneTypes->base_distance = $request->base_distance;
            $zoneTypes->price_per_distance = $request->price_per_distance;
            $zoneTypes->price_per_time = $request->price_per_time;
            $zoneTypes->waiting_charge = $request->waiting_charge;
            $zoneTypes->payment_type = $payment_type;

        $zoneTypes->show_bill = $request->show_bill;
        $zoneTypes->currency = $currencySymbol;
        $zoneTypes->currency_id = $currencyId;
        $zoneTypes->save();



        $zoneType_array = array('success'=>"TRUE",'message'=>trans('localization::errors.zone_type_updated_successfully'));
        $request->session()->flash('success', $zoneType_array);

        return Redirect::to("/admin/zone/typeView/".$zoneTypes->zone_id);

    }


    public function zoneTypeStatusToggle(Request $request){

        $zoneType = ZoneTypeModel::where('id',$request->id)->first();


        $old_state=$zoneType->is_active;

        if($old_state==0){

            $zoneType->is_active=1;

            $zoneType_array = array('success'=>"TRUE",'message'=>trans('localization::errors.zone_type_active_successfully'));
        }
        elseif($old_state==1)
        {
            $zoneType->is_active=0;

            $zoneType_array = array('success'=>"TRUE",'message'=>trans('localization::errors.zone_type_inactive_successfully'));
        }
        $zoneType->save();

        $request->session()->flash('success', $zoneType_array);

        return Redirect::to("/admin/zone/typeView/".$zoneType->zone_id);

    }

    public function zoneSurgeEdit(Request $request)
    {
        // echo "<pre>";print_r("wrks");die();
        $zonePeak = ZonePeakModel::where('zone_id',$request->id)->first();

        if(count($zonePeak)==0){
            $zonePeak=array(
                'peaktime'=>"",
                'peaktime_start'=>"",
                'peaktime_end'=>"",
                'peaktime_value'=>"",
                'peak_apply_on'=>"",
                'nighttime'=>"",
                'nighttime_start'=>"",
                'nighttime_end'=>"",
                'nighttime_value'=>"",
                'night_apply_on'=>"",
            );
            $zonePeak=(object)$zonePeak;
        }
        //echo "<pre>";print_r($zonePeak);die();
        $title = trans('localization::lang_view.surge_price');

        return view('zone::ZoneSurgeEdit',['request'=>$request,'zonepeak'=>$zonePeak,'page'=>"zone_module",'title'=>$title]);


    }


    public function zoneSurgeUpdate(Request $request)
    {
        // echo "<pre>";print_r($request->all());//die();

        $zonePeak = ZonePeakModel::where('zone_id',$request->id)->first();


        if(count($zonePeak)==0){
            $zonePeak = new ZonePeakModel();
            $zonePeak->zone_id = $request->id;
        }


        if($request->has('peakTime')){
            $peaktime = 1;

        }else{
            $peaktime = 0;

        }

        if($request->has('nightTime')){
            $nighttime = 1;

        }else{
            $nighttime = 0;
        }

        $zonePeak->peaktime = $peaktime;
        $zonePeak->peaktime_start = $request->peak_start;
        $zonePeak->peaktime_end = $request->peak_end;
        $zonePeak->peaktime_value = $request->peak_value;
        $zonePeak->peak_apply_on = $request->peak_apply;
        $zonePeak->nighttime = $nighttime;
        $zonePeak->nighttime_start = $request->night_start;
        $zonePeak->nighttime_end = $request->night_end;
        $zonePeak->nighttime_value = $request->night_value;
        $zonePeak->night_apply_on = $request->night_apply;

        $zonePeak->save();

        // echo "<pre>";print_r($zonePeak);die();

        $zoneSurge_array = array('success'=>"TRUE",'message'=>trans('localization::errors.zone_surge_price_updated_successfully'));
        $request->session()->flash('success', $zoneSurge_array);

        return Redirect::to("/admin/zone/surge/".$request->id);
    }


    public function zoneMapView(Request $request)
    {
        $zoneMap = ZoneBoundModel::where('zone_id',$request->id)->get();
        $zoneName = ZoneModel::select('name')->where('id',$request->id)->first();
        //echo "<pre>";print_r($zoneMap);die();

        $title = trans('localization::lang_view.zone');
        return view('zone::ZoneMapView',['zonemap'=>$zoneMap,'zoneName'=>$zoneName,'page'=>"zone_module",'title'=>$title]);

    }

}

