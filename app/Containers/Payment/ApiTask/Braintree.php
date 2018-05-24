<?php


namespace App\Containers\Payment\ApiTask;
use App\Containers\Common\GetConfigs;
use Braintree\Configuration as Braintree_Configuration;
use Braintree\Gateway;


/**
 * Class Braintree
 * @package App\Containers\Payment\ApiTask
 */
class Braintree
{
    public static $gateway;

    public function run()
    {

        /*Braintree_Configuration::environment('sandbox');
        Braintree_Configuration::merchantId('dzyrm5nc7h9jr3nr');
        Braintree_Configuration::publicKey('3cxryqwyg9cyq7mq');
        Braintree_Configuration::privateKey('ece77cd5774720d9e1b5d758c779af3b');*/

        if(Braintree::$gateway == null)
        {
            Braintree::$gateway = new Gateway([
                'environment' => GetConfigs::getConfigs('btree_environment'),
                'merchantId' => GetConfigs::getConfigs('btree_merchant_id'),
                'publicKey' => GetConfigs::getConfigs('btree_public_key'),
                'privateKey' => GetConfigs::getConfigs('btree_private_key')
            ]);
        }
        return Braintree::$gateway;

    }
}