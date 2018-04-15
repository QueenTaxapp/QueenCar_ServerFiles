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
class CheckCode
{

    /**
     * @param $data
     * @param $custom_parameter
     */
    public function run($data, $custom_parameter)
    {
        $referral=ReferralModel::where('code',$data['request']->referral_code)->first();



        if($referral)
        {

            $user=UserTableModel::find($data['request']->id);
            $user_detail = $user->user_detail()->first();

            if($referral->user_id != $user->id)
            {

                if($user_detail->referred_by == 0)
                {

                    $user_detail->referred_by=$referral->user_id;
                    $user_detail->save();
                    $referral->amount_earned += 1.00;
                    $referral->amount_balance += 1.00;
                    $referral->save();
                    $user_referral = ReferralModel::where('user_id',$data['request']->id)->first();
                    $user_referral->amount_earned +=1.00;
                    $user_referral->save();
                    $object = new \stdClass();
                    $object->message="Referral_Added_Successfully";
                    $data['response']=$object;
                    return $data;

            }
                else{
                    throw (new CommonException())->setValue('707',trans('localization::errors.707'));
                }
            }
            else{
                throw (new CommonException())->setValue('708',trans('localization::errors.708'));
            }
        }
        else{
            throw (new CommonException())->setValue('709',trans('localization::errors.709'));
        }


    }
}