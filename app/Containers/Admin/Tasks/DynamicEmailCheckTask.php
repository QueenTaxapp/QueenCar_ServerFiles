<?php

namespace App\Containers\Admin\Tasks;

use App\Ship\Parents\Tasks\Task;

use Illuminate\Support\Facades\Hash;
use App\Ship\Exceptions\CommonException;


class DynamicApiEmailCheckTask extends Task
{

    public function run($emailAddress , $tableNameSpace , $select = '*' , $errorCode )
    {

        $checkEmailAddress = $tableNameSpace::select($select)->where('email','=',$emailAddress)->first();



        if( count ($checkEmailAddress) == 0 )
        {
            $errorMessage = trans("localization::errors.$errorCode");

            
            throw (new CommonException())->setValue($errorCode, $errorMessage);
        }

        return $checkEmailAddress;

    }
}