<?php

namespace App\Containers\Company\Webtasks;

use App\Containers\Admin\Models\DriversModel;

use Illuminate\Support\Facades\Session;

class ToggleStatusTask
{
  
    public function run($tableName,$columnName,$value,$id,$company = null)
    {
        if($value == 1)
        {
            $value = 0;
        }
        else
        {
            $value = 1;
        }

        $tableName::where('id',$id)
          ->update([$columnName => $value]);

        if( $company == true)
        {
            if(Session::get('company_status') == $id)
            {
                if($value == 0)
                {
                    Session::put('company_status',0);
                }
                else
                {
                    Session::put('company_status',1);
 
                }
            }
            
        }

    }
}