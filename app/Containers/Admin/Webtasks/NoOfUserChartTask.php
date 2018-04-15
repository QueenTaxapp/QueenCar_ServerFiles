<?php

namespace App\Containers\Admin\Webtasks;

use App\Containers\Common\ApiHelper;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Support\Facades\Session;


class NoOfUserChartTask
{
  
    public function run()
    {
        $drivers = UserTableModel::select('id','created_at');
        
        $drivers = $drivers->orderBy('created_at','ASC')->get();
        $array=array();
        foreach($drivers as $key=>$value){

            $dates = date_create($value->created_at);
            $date=date_format($dates,"Y-m-d");

            $array[$date][]=$value->id;

        }

        $count = count($array);

        $c = $count-10;

        $json=array('chart'=>"linechart");

        $i=1;
        foreach($array as $akey=>$avalue) {
            if($i>=$c){
                $json[] = array('date'=>$akey,'count'=>count($avalue));
            }

            $i++;
        }
        return $json;
    }
}