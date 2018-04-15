<?php

namespace App\Containers\Promocode\Webtasks;

use App\Containers\Common\GetConfigs;
use App\Containers\Promocode\Models\PromocodeModel;
use App\Ship\Parents\Tasks\Task;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class PromoSearchTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
       // print_r($request->all());die();

        $page =  GetConfigs::getConfigs('paginate');

        $value = $request->filter_value;
        $type = $request->filter_type;


       // print_r($request->all());die();
      //  if($type=="type"){
          //  $request->session()->put('filter_value', $value);
       // }
        $request->session()->put('filter_value', $value);

        if($type=="type")
        {
            $value = $request->filter_value_select;
            $request->session()->put('filter_value_select', $value);
        }
        $request->session()->put('filter_type', $type);

      //  $query=AdminModel::select('Admin.*');
        $query=PromocodeModel::select('*');


       if ($type == 'coupon_name') {

            if ($request->submit && $request->submit == 'Download_Report') {

                $heroes = $query->where('coupon_code', 'like', '%' . $value . '%')->get();

            }else {

                $heroes = $query->where('coupon_code', 'like', '%' . $value . '%')->paginate($page);

            }
        }
        elseif ($type == 'type') {

            if ($request->submit && $request->submit == 'Download_Report') {

                $heroes = $query->where('type', $value)->get();

            }else {

                $heroes = $query->where('type', $value)->paginate($page);

            }
        }


        return $heroes;

    }

}