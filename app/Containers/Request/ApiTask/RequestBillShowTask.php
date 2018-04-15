<?php

namespace App\Containers\Request\ApiTask;

use Carbon\Carbon;
use Braintree\Customer;
use Braintree\Transaction;
use Braintree\PaymentMethodNonce;
use App\Containers\Jobs\SendSmsJob;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Jobs\SendEmailJob;
use App\Containers\Common\Configs_Class;
use App\Containers\Wallet\Models\Wallet;
use App\Ship\Exceptions\CommonException;
use App\Containers\Payment\Models\Payment;
use App\Containers\Zone\Models\ZonePeakModel;
use App\Containers\Zone\Models\ZoneTypeModel;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\User\Models\UserTableModel;
use App\Containers\Jobs\IosPushNotificationJob;
use App\Containers\Request\Models\RequestModel;
use App\Containers\Referral\Models\ReferralModel;
use App\Containers\Drivers\Models\DriverPaidModel;
use App\Containers\Jobs\AndroidPushNotificationJob;
use App\Containers\Promocode\Models\PromocodeModel;
use App\Containers\Request\Models\RequestBillModel;
use App\Containers\User\Models\UserWalletSpentModel;
use App\Containers\Drivers\Models\DriverAccountModel;
use App\Containers\Company\Models\CompanyAccountModel;
use App\Containers\Currency\Models\CommonCurrencyModel;
use Braintree\Configuration as Braintree_Configuration;
use App\Containers\Drivers\ApiTask\DriverRequestInprogressTask;
use App\Containers\Drivers\UI\API\Transformers\DriverRequestInprogressTransformer;

/**
 * Class ApiEta
 * @package App\Containers\eta\ApiTask
 */
class RequestBillShowTask
{
    public function run($data, $custom_parameter)
    {
        $driverId = $data['request']->id;

        $obj = new ApiHelper();

/*
        echo "<pre>";
        print_r($result);
        die();*/

        //echo "<pre>";print_r($data['request']->request_id);die("wrks");
        Braintree_Configuration::environment(env('BT_ENVIRONMENT'));//('sandbox');
        Braintree_Configuration::merchantId(env('BT_MERCHANT_ID'));//('dzyrm5nc7h9jr3nr');
        Braintree_Configuration::publicKey(env('BT_PUBLIC_KEY'));//('3cxryqwyg9cyq7mq');
        Braintree_Configuration::privateKey(env('BT_PRIVATE_KEY'));//('ece77cd5774720d9e1b5d758c779af3b');

        $requestTable = RequestModel::where('id',$data['request']->request_id)->first();

        if(count($requestTable) == 0)
        {
          throw (new CommonException())->setValue('803',trans('localization::errors.803'));

        }

        if( $requestTable->is_completed==1){

            $res['request'] = (object)array('id'=> $requestTable->driver_id);

            $obj_inp = new DriverRequestInprogressTask();

            $request_inp = $obj_inp->run($res,null);
            $request_inp['change_transform']='already_completed';
            return $request_inp;


        //    $obj_inp_trans = new DriverRequestInprogressTransformer();


     //      $test= $obj_inp_trans->transform($request_inp['response']);


           //echo \GuzzleHttp\json_encode("errorrrrrs");
        }

        // driver fee from trip

        DriverModel::where('id', '=', $driverId)
            ->update(array('is_available' => 1));

        $total_duration = $this->durationTimeCalculate($requestTable->trip_start_time);

        $zoneTypeTable = ZoneTypeModel::leftjoin('zone','zone.id','zone_type.zone_id')
        ->select('zone_type.*','zone.unit')
        ->where('zone_type.id',$requestTable->type)->first();

        $zone_currency_id = $zoneTypeTable->currency_id;

        $zonePeakTable = ZonePeakModel::where('zone_id',$zoneTypeTable->zone_id)->first();

        $beforeWaitingTime = $data['request']->before_waiting_time;

        $afterWaitingTime = $data['request']->after_waiting_time;

        if($requestTable->unit == 0)
        {
            $distance = ApiHelper::kilometer_to_miles($data['request']->distance);

            $base_distance = ApiHelper::kilometer_to_miles($zoneTypeTable->base_distance);
        }
        else
        {
            $distance = $data['request']->distance;

            $base_distance = $zoneTypeTable->base_distance;
        }




        $total_waiting_time =$beforeWaitingTime+$afterWaitingTime;

        $total_travel_time =  ($total_duration - $afterWaitingTime) > 0?($total_duration - $afterWaitingTime):0;

        $base_price = $zoneTypeTable->base_price;



        $price_per_distance = $zoneTypeTable->price_per_distance;
        $price_per_time = $zoneTypeTable->price_per_time;
        $waiting_charge = $zoneTypeTable->waiting_charge;

        $after_base_distance = $distance - $base_distance;


        if(count($zonePeakTable)>0 || $zonePeakTable != ""){

            $dates=date_create($requestTable->trip_start_time);

            $request_time=date_format($dates,"H:i:s");

            //peak

            if($zonePeakTable->peaktime == 1){

                if($zonePeakTable->peaktime_start <= $request_time && $request_time <= $zonePeakTable->peaktime_end){

                    $peakValue = $zonePeakTable->peaktime_value;

                    if($zonePeakTable->peak_apply_on == 1)
                    {
                        $base_price = (($peakValue/100) * $base_price) + $base_price;
                    }
                    elseif($zonePeakTable->peak_apply_on == 2)
                    {
                        $price_per_distance = (($peakValue/100) * $price_per_distance) + $price_per_distance;
                    }
                }

            }

            if($zonePeakTable->nighttime == 1){

                if($zonePeakTable->nighttime_start <= $request_time && $request_time <= $zonePeakTable->nighttime_end){

                    $nightValue = $zonePeakTable->nighttime_value;

                    if($zonePeakTable->night_apply_on == 1)
                    {
                        $base_price = (($nightValue/100) * $base_price) + $base_price;

                    }
                    elseif($zonePeakTable->night_apply_on == 2)
                    {
                        $price_per_distance = (($nightValue/100) * $price_per_distance) + $price_per_distance;
                    }
                }

            }

        }

        $final_base_price = $base_price;  //base_price
        $final_base_distance = $base_distance;  //base_distance
        $final_price_per_distance = $price_per_distance;  //price_per_distance
        $final_price_per_time = $price_per_time;  //price_per_time

        if($after_base_distance >0)
        {
            $after_base_distance_total_distance_amount = $price_per_distance * $after_base_distance;
        }
        else
        {
            $after_base_distance_total_distance_amount = 0;
        }
        //distance_price
        $after_waiting_time_total_time_amount = $total_travel_time *  $price_per_time;//time_price
        $total_waiting_time_amount = $total_waiting_time *  $waiting_charge;//waiting_price

        $total_amount_without_tax = (   $final_base_price +
            $after_base_distance_total_distance_amount +
            $after_waiting_time_total_time_amount +
            $total_waiting_time_amount
        );

        $promoTotalValue = 0;
        if($requestTable->promo_id != 0){

            $promoTable = PromocodeModel::where('id',$requestTable->promo_id)->first();

            $promoValue = $promoTable->value;

            if($promoTable->type == 0){

                $promoTotalValue = $promoValue;

            }elseif($promoTable->type == 1){

                $promoTotalValue = (($promoValue/100) * $total_amount_without_tax);

            }

        }else{

            $promoTotalValue = 0;
        }



        $referralTable = ReferralModel::where('user_id',$requestTable->user_id)->first();


        $referral_amount = $referralTable->amount_balance;  //referral_amount



        $userTable = UserTableModel::leftJoin('User_detail','User.id','=','User_detail.user_id')->where('User.id',$requestTable->user_id)->first();

        $user_currency_code = $userTable->currency_code;

        $commonCurrencyTable = CommonCurrencyModel::where('id',$zone_currency_id)->first();

        $zone_currency_code = $commonCurrencyTable->standard_name;

        $service_fee = GetConfigs::getConfigs('service_fee');
        $service_tax = GetConfigs::getConfigs('service_tax');

        $service_tax_amount = (($service_tax/100)*$total_amount_without_tax);
        $total = $service_tax_amount + $total_amount_without_tax;

        $service_fee_amount = (($service_fee/100)*$total);
        $driver_amount = $total - $service_fee_amount;  //driver_amount

        $total_amount = $total - $promoTotalValue;// - ;//total_amount

        if($total_amount <= 0){

            $total_amount = 0;

        }else{

            if($user_currency_code == $zone_currency_code){

                if($total_amount <= $referral_amount)
                {
                    $balance = $referral_amount - $total_amount;
                    $referralTable->amount_balance -= $total_amount;
                    $referralTable->amount_spent += $total_amount;
                    $referralTable->save();
                    $total_amount=0;
                }
                else{
                    $total_amount=$total_amount-$referral_amount;
                    $referralTable->amount_balance -= $referral_amount;
                    $referralTable->amount_spent += $referral_amount;
                    $referralTable->save();
                }


                //update referral balance table
                if($total_amount <= 0){
                    $total_amount = 0;
                }
            }


        }

        $walletTable = Wallet::where('user_id',$requestTable->user_id)->first();

        if($walletTable == ""){
            $wallet_amount = 0;
        }else{
            $wallet_amount = $walletTable->amount_balance;
        }



        $user_array = array(
            'id' => $userTable->user_id,
            'firstname' => $userTable->firstname,
            'lastname' => $userTable->lastname,
            'email' => $userTable->email,
            'phone_number' => $userTable->phone_number,
            'profile_pic' => $userTable->profile_pic,
            'review' => $userTable->review?:'0'
        );

        $driverTable = DriverModel::leftJoin('Driver_Details','Drivers.id','=','Driver_Details.driver_id')->where('Drivers.id',$requestTable->driver_id)->first();

        $driver_array =  array(
            'id' => $driverTable->driver_id,
            'firstname' => $driverTable->firstname,
            'lastname' => $driverTable->lastname,
            'email' => $driverTable->email,
            'phone_number' => $driverTable->phone_number,
            'profile_pic' => $driverTable->profile_pic,
            'review' => $driverTable->review?:'0'
        );

       // echo "<pre>";print_r($request_bill);die();


        $requestTable->distance = $distance;
        $requestTable->time = $total_duration;
        $requestTable->total = $total_amount;
        $requestTable->save();




        //driver amount starts


        $driverPaidTable = new DriverPaidModel();

        $driverPaidTable->request_id = $data['request']->request_id;

        payment:

        $driverAccountTable = DriverAccountModel::where('driver_id',$requestTable->driver_id)->first();

        $companyAccountTable = CompanyAccountModel::where('company_id',$driverTable->company)->first();

        $wallet_withDraw = 0;
        $conversion = "-";

        if($requestTable->payment_opt == 1){
            $driverPaidTable->transfer_id = 0;

            $requestTable->is_paid = 1;
            $requestTable->save();

        }
        elseif($requestTable->payment_opt == 0)
        {

           // echo "payment is card";die();
            $paymentTable = Payment::where('user_id',$requestTable->user_id)->where('is_default',1)->first();

            if($paymentTable == ""){
               //echo "card not available";die();
                $requestTable->payment_opt = 1;
                $requestTable->save();

                //push("card not available pay cash");

                $this->userPush($requestTable->user_id, (object)array('success'=>false,'success_message'=>'pay_by_cash','message'=>trans('localization::errors.card_not_available_pay_by_cash')), trans('localization::errors.card_not_available'));
                $this->driverPush($requestTable->driver_id, (object)array('success'=>false,'success_message'=>'collect_by_cash','message'=>trans('localization::errors.card_not_available_collect_by_cash')), trans('localization::errors.card_not_available'));

                goto payment;
            }

           // echo "card  available";die();

          /* $results = PaymentMethodNonce::create('credit card');
            $nonce = $results->paymentMethodNonce->nonce;*/

          if($zone_currency_code == "USD"){

              $converted_amount = $total_amount;

              $user_amount_in_usd = $obj->CurrencyGet($user_currency_code);

              $user_currency_total = ($total_amount * $user_amount_in_usd);

              $converted_service_fee_amount = $service_fee_amount;

              $conversion = "USD-".$user_currency_code.':'.number_format($user_currency_total, 2);

          }else{

              $zone_amount_in_usd = $obj->CurrencyGet($zone_currency_code);

              if($zone_amount_in_usd == null){
                  echo "your currency not present";die();
              }
              //    total/user_currency cost
              $converted_amount = ( $total_amount / $zone_amount_in_usd);

              $user_amount_in_usd = $obj->CurrencyGet($user_currency_code);

              if($user_amount_in_usd == null){
                  echo "your currency not present";die();
              }

              $user_currency_total = ( $converted_amount * $user_amount_in_usd);

              $converted_service_fee_amount = ($service_fee_amount / $zone_amount_in_usd);

              $conversion = $zone_currency_code."-".$user_currency_code.':'.number_format($user_currency_total, 2);

          }

            if($companyAccountTable != ""){
               //echo "company card available";die();
                if(GetConfigs::getConfigs('auto_transfer') == 1){
                    $result = Transaction::sale([
                        'amount' => number_format($converted_amount, 2),
                        'merchantAccountId' => $companyAccountTable->company_acc_id,
                        'customerId' => $paymentTable->customer_id,
                        'options' => array(
                            'submitForSettlement' => true,
                            'holdInEscrow' => true,
                        ),
                        'serviceFeeAmount' => number_format($converted_service_fee_amount, 2)
                    ]);

                    if($result->success)
                    {
                        $driverPaidTable->transfer_id = 2;
                        $driverPaidTable->company_id = $driverTable->company;
                    }
                    else{

                        $driverPaidTable->transfer_id = 0;
                    }
                }
                else{
                    goto  merchantPay;
                }

            }
            elseif($driverAccountTable != ""){
               // echo "driver card available";die();
                if(GetConfigs::getConfigs('auto_transfer') == 1){

                    $result = Transaction::sale([
                        'amount' => number_format($converted_amount, 2),
                        'merchantAccountId' => $driverAccountTable->driver_acc_id,
                        'customerId' => $paymentTable->customer_id,
                        'options' => array(
                            'submitForSettlement' => true,
                            'holdInEscrow' => true,
                        ),
                        'serviceFeeAmount' => number_format($converted_service_fee_amount, 2)
                    ]);

                    if($result->success)
                    {
                       // echo "card success";die();
                        $driverPaidTable->transfer_id = 1;
                        $driverPaidTable->driver_id = $requestTable->driver_id;

                    }else{

                        //echo "card error";die();
                        $driverPaidTable->transfer_id = 0;

                    }
                }
                else{
                   // echo "cardsss not available";die();
                    goto  merchantPay;
                }

            }
            else{
               //die("no cards");
                merchantPay:

                $result = Transaction::sale([
                    'amount' => number_format($converted_amount, 2),
                    'customerId' => $paymentTable->customer_id
                ]);

                $driverPaidTable->transfer_id = 0;
            }




            if ($result->success) {

                $requestTable->is_paid = 1;
                $requestTable->payment_id = $result->transaction->id;
                $requestTable->card_id = $paymentTable->id;
                $requestTable->save();

                //print_r($result);
                //print_r("success!: " . $result->transaction->id);

            }else{

                $requestTable->payment_opt = 1;
                $requestTable->save();

                //push("Error processing transaction");
                $user_msg =(object)array('success'=>false,'success_message'=>'pay_by_cash','message'=>trans('localization::errors.card_not_available_pay_by_cash'));

                $driver_msg = (object)array('success'=>false,'success_message'=>'collect_by_cash','message'=>trans('localization::errors.card_not_available_collect_by_cash'));

                $this->userPush($requestTable->user_id, $user_msg , trans('localization::errors.card_invalid'));
                $this->driverPush($requestTable->driver_id, $driver_msg , trans('localization::errors.card_invalid'));


                goto payment;
                //print_r("Error processing transaction:");
                //print_r("\n  code: " . $result->transaction->processorResponseCode);
                //print_r("\n  text: " . $result->transaction->processorResponseText);
            }

            //echo "<pre>";/*print_r($paymentTable);*/die();
        }
        elseif($requestTable->payment_opt == 2)
        {
            $driverPaidTable->transfer_id = 0;

            $spent_table = new UserWalletSpentModel();

            $spent_table->user_id = $requestTable->user_id;
            $spent_table->request_id = $data['request']->request_id;


            if($user_currency_code == $zone_currency_code){

                $converted_total_amount = $total_amount;

                $converted_wallet_amount = $wallet_amount;

                $wallet_conversion = $user_currency_code.'-'.$user_currency_code.':';

                $request_conversion = $zone_currency_code.'-'.$zone_currency_code.':';


            }else{
                /*
                 * zone currency type changed to user wallet amount
                 */

                $user_currency_in_usd = $obj->CurrencyGet($user_currency_code);//user amount in dollar

                if($user_currency_in_usd == null){
                    echo "your currency not present";die();
                }

                $zone_currency_in_usd = $obj->CurrencyGet($zone_currency_code);

                if($zone_currency_in_usd == null){
                    echo "zone currency not present";die();
                }

               // echo $user_currency_in_usd."<br>";
               // echo $zone_currency_in_usd;
//die();
                $zone_usd_total_amount = ( $total_amount / $zone_currency_in_usd );

                $converted_total_amount = ($zone_usd_total_amount * $user_currency_in_usd);//total

                $user_usd_wallet_amount = ($wallet_amount / $user_currency_in_usd);

                $converted_wallet_amount = ($user_usd_wallet_amount * $zone_currency_in_usd);//wallet

                $wallet_conversion = $user_currency_code.'-'.$zone_currency_code.':';

                $request_conversion = $zone_currency_code.'-'.$user_currency_code.':';

            }


            if($wallet_amount >= $converted_total_amount){



                $requestTable->is_paid = 1;
                $requestTable->save();

                $walletTable->amount_balance = $wallet_amount - $converted_total_amount;
                $walletTable->amount_spent += $converted_total_amount;

                $walletTable->save();

                $wallet_withDraw = $total_amount;

                $wallet_table_conversion = $wallet_conversion.number_format($total_amount, 2);

                $conversion = $request_conversion.number_format($converted_total_amount, 2);

                $spent_table->amount = $converted_total_amount;
                $spent_table->conversion = $wallet_table_conversion;
                $spent_table->save();

                $total_amount=0;

            }
            else{

                $requestTable->payment_opt = 3;
                $requestTable->is_paid = 1;
                $requestTable->save();

                $walletTable->amount_balance = 0;
                $walletTable->amount_spent += $wallet_amount;

                $walletTable->save();

                $wallet_withDraw = $converted_wallet_amount;

                $wallet_table_conversion = $wallet_conversion.number_format($converted_wallet_amount, 2);

                $conversion = $request_conversion.number_format($converted_total_amount, 2);

                $spent_table->amount = $wallet_amount;
                $spent_table->conversion = $wallet_table_conversion;
                $spent_table->save();

                $balance_amount = $total_amount - $converted_wallet_amount;

                $total_amount = $balance_amount;

               // push("balance amount ".$total_amount);
                $this->userPush($requestTable->user_id, (object)array('success'=>false,'success_message'=>'pay_balance_amount','message'=>trans('localization::errors.pay_balance_amount').' '.number_format($balance_amount, 2)), trans('localization::errors.balance_amount'));
                $this->driverPush($requestTable->driver_id, (object)array('success'=>false,'success_message'=>'collect_balance_amount','message'=>trans('localization::errors.collect_balance_amount').' '.number_format($balance_amount, 2)), trans('localization::errors.balance_amount'));

            }


        }

        $unitArray = array('mile','km');
        $unitWithLang = trans('localization::lang_view.'.$unitArray[$zoneTypeTable->unit]);



        $all_value_array = array(
            'show_bill' => $zoneTypeTable->show_bill,
            'base_price' => $final_base_price,
            'base_distance' => $final_base_distance,
            'price_per_distance' => $final_price_per_distance,
            'price_per_time' => $final_price_per_time,
            'distance_price' => $after_base_distance_total_distance_amount,
            'time_price' => $after_waiting_time_total_time_amount,
            'waiting_price' => $total_waiting_time_amount,
            'service_tax' => $service_tax_amount,
            'service_tax_percentage' => $service_tax,
            'promo_amount' => $promoTotalValue,
            'referral_amount' => $referral_amount,
            'wallet_amount' => $wallet_withDraw,
            'service_fee' => $service_fee_amount,
            'driver_amount' => $driver_amount,
            'total' => $total_amount,
            'currency' => $zoneTypeTable->currency,
            'conversion' => $conversion,
            'unit' => $zoneTypeTable->unit,
            "unit_in_words_without_lang" => $unitArray[$zoneTypeTable->unit],
            "unit_in_words"=> $unitWithLang,
        );

        $request_bill = $this->requestBillGenerate($data['request']->request_id,$all_value_array);


        $driverPaidTable->save();//driver amount ends



        $requestTable->is_completed = 1;
        $requestTable->save();





        // sms & email

        $details = Configs_Class::helper()->request_user_driver($data['request']->request_id);


        $requestId =  $details->request_id;
        $userPhoneNumber = $details->userPhoneNumber;
        $userEmailAddress =$details->userEmail;
        $userName = $details->userName;
        $driverName = $details->driverName;
        $driverPhoneNumber =$details->driverPhoneNumber;
        $driverEmailAddress =$details->driverEmail;
       //sms
       //user
       $sms =Configs_Class::helper()->sms(5);
       $message = $sms->message;
       dispatch(new SendSmsJob($userPhoneNumber,$message,$sms->status));

       //driver
       $sms =Configs_Class::helper()->sms(7);
       $message = $sms->message;
       dispatch(new SendSmsJob($driverPhoneNumber,$message,$sms->status));

        //sms


        //email

        $value = Configs_Class::helper()->Constant_email_data();

        $value['requestId'] = $requestId;
        $value['userName'] = $userName;
        $value['driverName'] = $driverName;
        $value['userPhoneNumber'] = $userPhoneNumber;
        $value['driverPhoneNumber'] = $driverPhoneNumber;
        $value['userEmailAddress'] = $userEmailAddress;
        $value['driverEmailAddress'] = $driverEmailAddress;
        $value['basePrice'] = $all_value_array['base_price'];
        $value['base_distance'] = $all_value_array['base_distance'];
        $value['distanceCost'] = $all_value_array['distance_price'];
        $value['timeCost'] = $all_value_array['time_price'];
        $value['waitingPrice'] = $all_value_array['waiting_price'];
        $value['serviceTax'] = $all_value_array['service_tax'];
        $value['serviceTaxPercentage'] = $all_value_array['service_tax_percentage'];
        $value['referralBonus'] = $all_value_array['referral_amount'];
        $value['promoBonus'] = $all_value_array['promo_amount'];
        $value['serviceFee'] = $all_value_array['service_fee'];
        $value['driverAmount'] = $all_value_array['driver_amount'];
        $value['total'] = $all_value_array['total'];


        $subject = trans('localization::lang_view.trip_completed_successfully');

        $lang = $data['request']->header('Content-Language');

        //driver
        $email =Configs_Class::helper()->email(8,$lang);
        dispatch(new SendEmailJob($email->message,$value,$driverEmailAddress,$subject,$email->status));

        //user
        $email =Configs_Class::helper()->email(6,$lang);
        dispatch(new SendEmailJob($email->message,$value,$userEmailAddress,$subject,$email->status));











        // sms & email

        $bill_array = $all_value_array;

        $request_array =array(
            'id' => (int) $data['request']->request_id,
            'request_id' => $requestTable->request_id,
            'distance' => $distance,
            'time' => $total_duration,
            'payment_opt' => $requestTable->payment_opt,
            'bill' => $bill_array,
            'user' => $user_array
        );
        $unitArray = array('miles','kilometer');
        $unitWithLang = trans('localization::lang_view.'.$unitArray[$requestTable->unit]);


        $user_request_array =array(
            'id' => (int)$data['request']->request_id,
            'request_id' => $requestTable->request_id,
            "is_driver_started" => $requestTable->is_driver_started,
            "is_driver_arrived" => $requestTable->is_driver_arrived,
            "is_trip_start" => $requestTable->is_trip_start,
            "is_completed" => $requestTable->is_completed,
            'distance' => $distance,
            'time' => $total_duration,
            'payment_opt' => $requestTable->payment_opt,
            'bill' => $bill_array,
            'driver' => $driver_array,


        );

        $obj = new \stdClass();
        $obj->message = "bill_generated";
        $obj->request = $request_array;
        $data['response']=$obj;

        $user_obj = new \stdClass();
        $user_obj->success_message = "bill_generated";
        $user_obj->success = true;
        $user_obj->request = $user_request_array;
        $data['user_response']=$user_obj;

       // echo "<pre>";print_r($data['user_response']);die();

        $structure = Configs_Class::helper()->php_to_node_structure($requestTable->user_id,'user', $data['user_response'],'trip_status');

        Configs_Class::helper()->php_to_node('transfer_msg',$structure);

        $this->userPush($requestTable->user_id, $data['user_response'], trans('localization::errors.bill_generated'));
       // $this->driverPush($requestTable->driver_id, $data['response'], "bill_generated");






       return $data;

      //  "unit"      => $requestTable->unit,
      //  "unit_in_words_without_lang" => $unitArray[$requestTable->unit],
      //  "unit_in_words"=> $unitWithLang,
    }

    public function durationTimeCalculate($startTime)
    {
        $currentTime = date('Y-m-d H:i:s');

        $startTime = Carbon::parse($startTime);
        $finishTime = Carbon::parse($currentTime);
        $totalDuration = $finishTime->diffInMinutes($startTime);

        return $totalDuration;
    }


    public function requestBillGenerate($request_id,$array)
    {
        //echo "<pre>";print_r($array['base_price']);die();

        $requestBillTable = new RequestBillModel();

        $requestBillTable->request_id = $request_id;
        $requestBillTable->base_price = $array['base_price'];
        $requestBillTable->base_distance = $array['base_distance'];
        $requestBillTable->price_per_distance = $array['price_per_distance'];
        $requestBillTable->price_per_time = $array['price_per_time'];
        $requestBillTable->distance_price = $array['distance_price'];
        $requestBillTable->time_price = $array['time_price'];
        $requestBillTable->waiting_price = $array['waiting_price'];
        $requestBillTable->service_tax = $array['service_tax'];
        $requestBillTable->service_tax_percentage = $array['service_tax_percentage'];
        $requestBillTable->promo_amount = $array['promo_amount'];
        $requestBillTable->referral_amount = $array['referral_amount'];
        $requestBillTable->wallet_amount = $array['wallet_amount'];
        $requestBillTable->service_fee = $array['service_fee'];
        $requestBillTable->driver_amount = $array['driver_amount'];
        $requestBillTable->total = $array['total'];
        $requestBillTable->conversion = $array['conversion'];

        $requestBillTable->save();

        return $requestBillTable;
    }

    public function userPush($user_id,$message,$title)
    {
        $userTable = UserTableModel::where('id',$user_id)->first();

        $userDeviceToken = $userTable->device_token;
        $userLoginBy = $userTable->login_by;

        Configs_Class::helper()->send_push($message,$title,$userDeviceToken,$userLoginBy,'user');

    }


    public function driverPush($driver_id,$message,$title)
    {
        $driverTable = DriverModel::where('id',$driver_id)->first();

        $driverDeviceToken = $driverTable->device_token;
        $driverLoginBy = $driverTable->login_by;

        Configs_Class::helper()->send_push($message,$title,$driverDeviceToken,$driverLoginBy,'driver');

    }




}
