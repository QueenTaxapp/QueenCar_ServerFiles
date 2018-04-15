<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Models\TempOtp;
use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;
use phpDocumentor\Reflection\Types\Boolean;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class MobileCheckTask extends Task
{


    /**
     * @param $request
     * @return array
     */
    public function run($request)
    {                          
       
        $phone=TempOtp::where('phone_number',$request->phone_number)->orWhere('verified_numbers',$request->phone_number)->first();
        if($phone && $phone->verified_numbers == null)
        {
            $status = array('StatusCode'=>1,'data' => ['token' => $phone->token]); //old temp otp

        }
        else{

            $phone=UserTableModel::where('phone_number',$request->phone_number)->first();
            if($phone)
            {
                $status = array('StatusCode'=>2,'data' => null); //already a user
            }
            else{
                if($phone && $phone->verified_numbers != null)
                {
                    $status = array('StatusCode'=>1,'data' => ['token' => $phone->token]); //old temp otp
                }
                else{
                    $status = array('StatusCode'=>3,'data' => null); //new user
                }

            }

        }

        return $status;
    }

}