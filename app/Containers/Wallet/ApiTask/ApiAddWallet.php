<?php


namespace App\Containers\Wallet\ApiTask;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\Configs_Class;
use App\Containers\Common\GetConfigs;
use App\Containers\Payment\ApiTask\Braintree;
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
class ApiAddWallet
{


    /**
     * @param $data
     * @param $custom_parameter
     */
    public function run($data, $custom_parameter)
    {
        $obj = new ApiHelper();

        $userTable = UserTableModel::where('id',$data['request']->id)->first();

        $currency_code = $userTable->currency_code;

        if($currency_code == "USD"){

            $converted_amount = $data['request']->amount;
            $converted_type = "USD-USD";

        }else{

            $user_amount_in_usd = $obj->CurrencyGet($currency_code);

            if($user_amount_in_usd == null){
                echo "your currency not present";die();
            }
            //    total/user_currency cost
            $converted_amount = ( $data['request']->amount / $user_amount_in_usd);

            //$converted_amount = $data['request']->amount;
            $converted_type = $currency_code."-USD";

        }

        $wallet=Wallet::where('user_id',$data['request']->id)->first();

        if($wallet)
        {

            $this->checkAmountAdd($converted_amount);
            $this->CheckWalletAmount($wallet,$converted_amount);
            $card=$this->findCard($data);
            $trans = $this->transfer($converted_amount,$card);


        }
        else
        {

            $wallet=new Wallet();
            $this->checkAmountAdd($converted_amount);
            $this->CheckWalletAmount($wallet,$converted_amount);
            $wallet->user_id=$data['request']->id;
            $card=$this->findCard($data);
            $trans = $this->transfer($converted_amount,$card);
            $wallet->amount_spent += 0;


        }

        $wallet->amount_earned += $data['request']->amount;
        $wallet->amount_balance += $data['request']->amount;
        $wallet->save();
        $history = new WalletUserHistory();
        $history->user_id = $data['request']->id;
        $history->card_id  = $data['request']->card_id;
        $history->transact_id  = $trans->transaction->id;
        $history->amount   = $data['request']->amount;
        $history->merchant  = $trans->transaction->merchantAccountId;
        $history->conversion = $converted_type.":".number_format($converted_amount, 2);

        $history->save();

        $userTable = UserTableModel::where('id', $data['request']->id)->first();

        $object = new \stdClass();
        $object->message="Added Wallet Successfully";
        $object->wallet=$wallet;
        $object->currency_symbol = $userTable->currency_symbol;
        $data['response'] =$object;
        return $data;
    }

    public function transfer($converted_amount,$card)
    {
        $BObj = new Braintree();
        $gateway = $BObj->run();

        $result = $gateway->transaction()->sale([
            'amount' => number_format($converted_amount, 2),
            'paymentMethodToken' => $card->card_token,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($result->success) {
            return $result;
        } else {
            throw (new CommonException())->setValue('718',trans('localization::errors.718'));
        }
    }

    public function findCard($data)
    {
        $payment = Payment::find($data['request']->card_id);
        if($payment)
        {
            return $payment;
        }
        else
        {
            throw (new CommonException())->setValue('713',trans('localization::errors.713'));
        }
    }

    public function checkAmountAdd($converted_amount)
    {

        if($converted_amount > GetConfigs::getConfigs('wallet_min_amount_to_add'))
        {
            $message= str_replace('%s',GetConfigs::getConfigs('wallet_min_amount_to_add'),trans('localization::errors.717'));
            throw (new CommonException())->setValue('717',$message);
        }
    }

    public function CheckWalletAmount($wallet,$converted_amount)
    {
        if(($wallet->amount_balance+$converted_amount) > GetConfigs::getConfigs('wallet_min_amount_to_balance'))
        {
            $message= str_replace('%s',GetConfigs::getConfigs('wallet_min_amount_to_balance'),trans('localization::errors.716'));
            throw (new CommonException())->setValue('716',$message);
        }

    }


}