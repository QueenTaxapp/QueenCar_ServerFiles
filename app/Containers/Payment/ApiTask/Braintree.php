<?php


namespace App\Containers\Payment\ApiTask;
use Braintree\Configuration as Braintree_Configuration;


/**
 * Class Braintree
 * @package App\Containers\Payment\ApiTask
 */
class Braintree
{

    public function run()
    {

        Braintree_Configuration::environment('sandbox');
        Braintree_Configuration::merchantId('dzyrm5nc7h9jr3nr');
        Braintree_Configuration::publicKey('3cxryqwyg9cyq7mq');
        Braintree_Configuration::privateKey('ece77cd5774720d9e1b5d758c779af3b');

    }
}