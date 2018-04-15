<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Models\TempOtp;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Hash;


/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class TempTokenCheck extends Task
{
    /**
     *  Check Token in Temp Table
     *
     * @param Object $request
     * @param String $phone
     *
     * @return  Object  TempOtp
     */
    public function run($request,$phone=null)
    {
        if($phone)
        {
            $temp = TempOtp::select('*')->where('token',$request->token)->where('phone_number',$phone)->first();
        }
        else{

            $temp = TempOtp::where('token',$request->token)->first();
        }


        if($temp)
        {


            return $temp;
        }
        else{

            throw (new CommonException())->setValue('700',trans('localization::errors.700'));
        }


    }

}
