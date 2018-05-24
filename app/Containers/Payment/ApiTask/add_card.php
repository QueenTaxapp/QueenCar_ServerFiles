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
use App\Ship\Parents\Exceptions\Exception;
use Braintree\Configuration as Braintree_Configuration;
use Braintree\Customer as Braintree_Customer;


/**
 * Class add_card
 * @package App\Containers\Payment\ApiTask
 */
class add_card
{


    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {
        $BObj = new Braintree();
        $gateway = $BObj->run();

        $user = UserTableModel::find($data['request']->id);

        try {
            $result = $gateway->customer()->create([
                'firstName' => $user->firstname,
                'lastName' => $user->lastname,
                'email' => $user->email,
                'phone' => $user->phone_number,
                'paymentMethodNonce' => $data['request']->payment_id,
                'id' => "customer_".rand(100,1000)."_".$user->id,
            ]);

            $count = Payment::where('user_id',$data['request']->id)->where('is_default',1)->count();
            $payment= new Payment();
            $payment->customer_id = $result->customer->id;
            $payment->merchant_id = $result->customer->merchantId;
            $payment->card_token = 0;
            $payment->card_token = $result->customer->creditCards[0]->token;
            $payment->last_number = $data['request']->last_number;
            $payment->card_type = $data['request']->card_type?:"VISA";
            $payment->user_id = $data['request']->id;
            $payment->is_default=$count == 0?1:0;
            $payment->save();
            $payment = Payment::where('user_id',$data['request']->id)->get();
            $payment_data=$this->make_payment_data($payment);
            $object = new \stdClass();
            $object->message = "Card_Added_Successfully";
            $object->payment = $payment_data;
            $data['response']=$object;
            return $data;
        }
        catch (Exception $e)
        {
            throw (new CommonException())->setValue('712',trans('localization::errors.712'));
        }


    }

    /**
     * common payment detail for all array
     *
     * @param $payment
     * @return array
     */
    public function make_payment_data($payment)
    {
        $payment_data=[];
        $i=0;
        foreach ($payment as $pay)
        {
            $payment_data[$i]["card_id"]=$pay->id;
            $payment_data[$i]["last_number"]=$pay->last_number;
            $payment_data[$i]["card_type"]=$pay->card_type;
            $payment_data[$i]["is_default"]=$pay->is_default?true:false;
            $i++;
        }
        return $payment_data;
    }
}