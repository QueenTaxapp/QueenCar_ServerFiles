<?php

namespace App\Containers\Review\Webtasks;

use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\User;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\AdminDetails;
use Illuminate\Support\Facades\Hash;
use App\Containers\Admin\Models\AdminTypesModel;


class SaveEditReviewTask 
{
    public function run($tableName,$tableName2,$request)
    {
        $save = $tableName::where('id', $request['id'])
                            ->update(['rating' => $request['rating'],'comment'=>$request['comment']]);

        $reterive = $tableName::select('rating')->get();

        $array = array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0);
             
        foreach($reterive as $value)
        {
            $array["$value->rating"] =   $array["$value->rating"] +1;
        }
                         
        $average =   ($array['5']*5 + $array['4']*4 + $array['3']*3 + $array['2']*2 + $array['1']*1) / ($array['5'] + $array['4'] + $array['3'] + $array['2'] + $array['1']);


        if($request->has('driver_id'))
        {
            $columnName = 'driver_id';
        }
        else
        {
            $columnName = 'user_id';
        }

        $saveAverage = $tableName2::where($columnName,$request[$columnName])
                         ->update(['review'=>$average]);
        
    }

}