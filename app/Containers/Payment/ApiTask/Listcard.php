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
 * Class PaymentDefault
 * @package App\Containers\Payment\ApiTask
 */
class Listcard extends add_card
{


    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {


        $payment=Payment::where('user_id',$data['request']->id)->get();
        $payment_data=$this->make_payment_data($payment);
        $object = new \stdClass();
        $object->message = "Get_card_list";
        $object->payment = $payment_data;
        $data['response']=$object;
        return $data;


    }
}