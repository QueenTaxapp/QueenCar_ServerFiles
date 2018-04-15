<?php
/**
 * Created by PhpStorm.
 * User: server-team-1
 * Date: 11/3/17
 * Time: 7:28 PM
 */

namespace App\Containers\Payment\ApiTask;
use App\Containers\Referral\Models\ReferralModel;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;
use Braintree\ClientToken as Braintree_ClientToken;
use Braintree\Configuration as Braintree_Configuration;

/**
 * Class CheckCode
 * @package App\Containers\Referral\ApiTask
 */
class client_token
{

    /**
     * @param $data
     * @param $custom_parameter
     */
    public function run($data, $custom_parameter)
    {

        Braintree_Configuration::environment(env('BT_ENVIRONMENT'));
        Braintree_Configuration::merchantId(env('BT_MERCHANT_ID'));
        Braintree_Configuration::publicKey(env('BT_PUBLIC_KEY'));
        Braintree_Configuration::privateKey(env('BT_PRIVATE_KEY'));
        $object = new \stdClass();
        $clientToken = Braintree_ClientToken::generate();
        $object->message = "Client_token";
        $object->token = $clientToken;
        $data['response']=$object;
        return $data;


    }
}