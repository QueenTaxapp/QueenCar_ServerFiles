<?php

namespace App\Containers\Company\Webtasks;

use App\Containers\Admin\Models\DriversModel;

use App\Containers\Admin\Webtasks\Message;

use Illuminate\Validation\ValidationException;

class DynamicEmailValidationTask
{
  
    public function run($email,$tableNameSpace,$select='*',$where='email!= 0',$routeName)
    {
        $details = $tableNameSpace::select($select)->whereRaw($where)->first();  

        if(count($details) != 0)
        {
            return $details;
        }
        else
        {

                throw new ValidationException((new Message()),redirect()->to($routeName)
                 ->withErrors([trans('localization::errors.username or password invalid')], 'default'));

        }

                
        
    }
}


