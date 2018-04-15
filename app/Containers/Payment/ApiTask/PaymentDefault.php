<?php
/**
 * Created by PhpStorm.
 * User: server-team-1
 * Date: 11/3/17
 * Time: 7:28 PM
 */

namespace App\Containers\Payment\ApiTask;
use App\Containers\Payment\Models\Payment;
use App\Containers\Referral\Models\ReferralModel;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;
use Braintree\ClientToken as Braintree_ClientToken;
use Braintree\Configuration as Braintree_Configuration;

/**
 * Class CheckCode
 * @package App\Containers\Referral\ApiTask
 */
class PaymentDefault extends add_card
{

    /**
     * @param $data
     * @param $custom_parameter
     */
    public function run($data, $custom_parameter)
    {

        $card=Payment::where('user_id',$data['request']->id)->where('id',$data['request']->card_id)->update(['is_default'=>1]);
        if(!$card)
        {
            throw (new CommonException())->setValue('715',trans('localization::errors.715'));
        }
        Payment::where('user_id',$data['request']->id)->update(['is_default'=>0]);
        Payment::where('user_id',$data['request']->id)->where('id',$data['request']->card_id)->update(['is_default'=>1]);
        $payment=Payment::where('user_id',$data['request']->id)->get();
        $payment_data=$this->make_payment_data($payment);
        $object = new \stdClass();
        $object->message = "default_changed";
        $object->payment = $payment_data;
        $data['response']=$object;
        return $data;


    }
}