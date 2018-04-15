<?php

namespace App\Containers\Company\Webtasks;

use App\Containers\Admin\Models\DriversModel;
use Illuminate\Support\Facades\Session;


class SessionBulkTask
{
  
    public function run($value,$Keys,$names=null)
    {  

        if(is_array($value))
        {
            $value = (object)$value;
        }

        $i = 0;
        foreach($Keys as $key)
        {
            Session::put($names[$i],$value->$key);
            $i = $i + 1;

        }
        // echo "<pre>";
        // print_r(Session::all());die();
    }
}


