<?php
/**
 * Created by PhpStorm.
 * User: server-team-1
 * Date: 11/3/17
 * Time: 7:28 PM
 */

namespace App\Containers\Referral\ApiTask;
use App\Containers\Referral\Models\ReferralModel;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;


/**
 * Class CheckCode
 * @package App\Containers\Referral\ApiTask
 */
class GetCode
{

    /**
     * @param $data
     * @param $custom_parameter
     */
    public function run($data, $custom_parameter)
    {

        $referral=ReferralModel::leftJoin('User','referral.user_id','=','User.id')
                ->where('referral.user_id',$data['request']->id)->first();



        if($referral)
        {
                $object = new \stdClass();
                $object->code = $referral->code;
                $object->amount_earned = $referral->amount_earned;
                $object->amount_spent = $referral->amount_spent;
                $object->amount_balance = $referral->amount_balance;
                $object->amount_balance = $referral->amount_balance;
                $object->currency_symbol = $referral->currency_symbol;
                $object->message= "Get_Referral_code";
            $data['response']=$object;
            return $data;
        }
        else{
            throw (new CommonException())->setValue('709',trans('localization::errors.709'));
        }


    }
}