<?php

namespace App\Containers\User\Tasks;

use App\Containers\Drivers\Models\DriverModel;
use App\Containers\User\Models\TempOtp;
use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;
use phpDocumentor\Reflection\Types\Boolean;


/**
 * Class UserMobileCheckTask
 * @package App\Containers\User\Tasks
 */
class UserMobileCheckTask extends Task
{
    /**
     * used to check if the email address/username is present or not
     * @param   Object $request
     * @param   Class $class
     *
     * @return  Object
     * @throw   CommonException ('Otp Already Sent to this number')
     */
    public function run($request,$class)
    {

            $phone=$class::where('phone_number',$request->phone_number)->orWhere('email',$request->phone_number)->first();

         if(!$phone)
         {
             TempOtp::where('token',$request->token)->delete();
             throw (new CommonException())->setValue('705',trans('localization::errors.705'));
         }
         return $phone;
    }

}