<?php


namespace App\Containers\Wallet\ApiTask;
use App\Containers\Payment\Models\Payment;
use App\Containers\Wallet\Models\Wallet;
use App\Containers\Referral\Models\ReferralModel;
use App\Containers\User\Models\UserTableModel;
use App\Containers\Wallet\Models\WalletUserHistory;
use App\Ship\Exceptions\CommonException;
use Braintree\Configuration as Braintree_Configuration;
use Braintree\Customer as Braintree_Customer;
use Braintree\Transaction as Braintree_Transaction;


/**
 * Class ApiAddWallet
 * @package App\Containers\Payment\ApiTask
 */
class ApiGetWalletAmount
{


    /**
     * @param $data
     * @param $custom_parameter
     */
    public function run($data, $custom_parameter)
    {
        $wallet = Wallet::where('user_id', $data['request']->id)->first();
        if (!$wallet) {
            $wallet = new Wallet();
            $wallet->user_id=$data['request']->id;
            $wallet->amount_earned += 0;
            $wallet->amount_balance += 0;
            $wallet->amount_spent += 0;
            $wallet->save();

        }

        $userTable = UserTableModel::where('id', $data['request']->id)->first();

        $object = new \stdClass();
        $object->message="Get_Wallet_Amount";
        $object->wallet=$wallet;
        $object->currency_symbol = $userTable->currency_symbol;
        $data['response'] =$object;
        return $data;

    }



}