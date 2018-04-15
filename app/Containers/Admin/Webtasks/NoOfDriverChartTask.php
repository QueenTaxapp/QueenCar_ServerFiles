<?php

namespace App\Containers\Admin\Webtasks;

use App\Containers\Common\ApiHelper;
use App\Containers\Drivers\Models\DriverModel;
use Illuminate\Support\Facades\Session;


class NoOfDriverChartTask
{
  
    public function run()
    {
        $drivers=DriverModel::select('id','created_at');


        $reterive_key =  ApiHelper::reterive_key();

        if($reterive_key != 0 )
        {
            $drivers= $drivers->where('Drivers.admin_reference',$reterive_key);

        }

        $drivers= $drivers->orderBy('created_at','ASC')->get();

        $array=array();

        foreach($drivers as $key=>$value){

            $dates = date_create($value->created_at);
            $date=date_format($dates,"Y-m-d");

            $array[$date][]=$value->id;

        }



        $count = count($array);

        $c = $count-10;

        $json=array('chart'=>"areachart");

        $i=1;
        foreach($array as $akey=>$avalue) {
            if($i>=$c){
                $json[] = array('date'=>$akey,'count'=>count($avalue));
            }

            $i++;
        }

      // echo "<pre>";print_r($json);die();
        return $json;
    }
}