<?php

namespace App\Containers\Company\Webtasks;

use App\Containers\Admin\Models\DriversModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Containers\Admin\Webtasks\Message;
use App\Containers\Company\Webtasks\BlockTask;

class DynamicPasswordValidationTask
{  
    public function run($plainText,$hashedPassword,$routeName,$block = null,$errorMessage='username or password invalid')
    {

        if (Hash::check($plainText, $hashedPassword)) 
        {
            if($block != null)
            {
                $object = new BlockTask;

                $object->run($block,true);

            }
            return true;
        }
        else
        {
            if($block != null)
            {
                $object = new BlockTask;

                $object->run($block,false);

            }


            throw new ValidationException((new Message()),redirect()->to($routeName)
                 ->withErrors([trans('localization::errors.'.$errorMessage)], 'default'));

        }

    }
}


