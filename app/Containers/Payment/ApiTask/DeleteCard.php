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
 * Class DeleteCard
 * @package App\Containers\Payment\ApiTask
 */
class DeleteCard extends add_card
{


    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {


        $delete=Payment::where('user_id',$data['request']->id)->where('id',$data['request']->card_id)->delete();
        if(!$delete)
        {
            throw (new CommonException())->setValue('714',trans('localization::errors.714'));
        }

            $payment=Payment::where('user_id',$data['request']->id)->get();
            $payment_data=$this->make_payment_data($payment);


        $object = new \stdClass();
        $object->message = "Card_Deleted_Successfully";
        $object->payment = $payment_data;
        $data['response']=$object;
        return $data;


    }
}