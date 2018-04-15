<?php

namespace App\Containers\Company\Webtasks;

use App\Containers\Admin\Models\DriversModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Containers\Admin\Tasks\Message;
use App\Containers\Company\Webtasks\BlockTask;

class SaveLoginIpTask
{  
    public function run($tablename,$columnName)
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } 
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } 
        else 
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $lastLoginIpAddress =  $tablename::select($columnName)->where('id',Session::get('company_id'))->first();

        $lastLoginIpAddress = $lastLoginIpAddress->last_login_ip_address;


        $data = @unserialize($lastLoginIpAddress);

        if(!$data)
        {
            $a = array();
            $a[0]='';$a[1]='';$a[2]='';$a[3]='';$a[4]='';

            $lastLoginIpAddress = serialize($a);
        }



        $lastLoginIpAddress =  unserialize($lastLoginIpAddress);
        
        $new = array();
        
        $new[0] = $ip;

        for($i=1 ;$i<=4;$i++)
        {
           $new[$i] = $lastLoginIpAddress[$i-1];
        }
        
        $serializedNew = serialize($new);

        $tablename::where('id',Session::get('company_id'))
                ->update([$columnName=>$serializedNew]);

    }
}


