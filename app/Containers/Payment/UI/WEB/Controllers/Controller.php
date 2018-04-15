<?php

namespace App\Containers\Payment\UI\WEB\Controllers;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Request\Models\RequestModel;
use App\Containers\Types\Models\Types;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


/**
 * Class Controller
 * @package App\Containers\Admin\UI\WEB\Controllers
 */
class Controller extends WebController
{

    public function adminPaymentViewPage(Request $request)
    {
        // echo "<pre>";print_r("welcome payment");die();
        $paginate = GetConfigs::getConfigs('paginate');

        $title = trans('localization::lang_view.payment');

        $requestData = RequestModel::leftjoin('Drivers','request.driver_id','=','Drivers.id')
            ->leftjoin('User','request.user_id','=','User.id')
            ->join('request_bill','request.id','=','request_bill.request_id')
            ->select(
                'request.*',
                'User.firstname as ufname',
                'User.lastname as ulname',
                'Drivers.firstname as dfname',
                'Drivers.lastname as dlname',

                'request_bill.wallet_amount',
                'request_bill.service_fee',
                'request_bill.driver_amount',
                'Drivers.admin_reference',
                'request_bill.wallet_amount'

            )->where('is_completed',1);


        $reterive_key =  ApiHelper::reterive_key();

        if($reterive_key != 0){

            $requestData = $requestData->where('Drivers.admin_reference',$reterive_key);

        }


        $requestData = $requestData->orderBy('id','desc')->paginate($paginate);


          if($reterive_key != 0){


              $total = RequestModel::leftJoin('request_bill','request.id','=','request_bill.request_id')
                      ->join('Drivers','request.driver_id','=','Drivers.id')
                      ->where('request.is_paid',1)
                      ->where('Drivers.admin_reference', $reterive_key)
                      ->sum('request_bill.total');

              $promo = RequestModel::leftJoin('request_bill','request.id','=','request_bill.request_id')
                      ->join('Drivers','request.driver_id','=','Drivers.id')
                      ->where('request.is_paid',1)
                      ->where('Drivers.admin_reference', $reterive_key)
                      ->sum('request_bill.promo_amount');

              $referral = RequestModel::leftJoin('request_bill','request.id','=','request_bill.request_id')
                      ->join('Drivers','request.driver_id','=','Drivers.id')
                      ->where('request.is_paid',1)
                      ->where('Drivers.admin_reference', $reterive_key)
                      ->sum('request_bill.referral_amount');

              $wallet = RequestModel::leftJoin('request_bill','request.id','=','request_bill.request_id')
                    ->join('Drivers','request.driver_id','=','Drivers.id')
                    ->where('request.is_paid',1)
                    ->where('Drivers.admin_reference', $reterive_key)
                    ->sum('request_bill.wallet_amount');

              $card_payment = RequestModel::join('Drivers','request.driver_id','=','Drivers.id')
                      ->where('is_paid',1)
                      ->where('Drivers.admin_reference', $reterive_key)
                      ->where('payment_opt',0)
                      ->sum('total');

              $cash_payment = RequestModel::join('Drivers','request.driver_id','=','Drivers.id')
                      ->where('is_paid',1)
                      ->where('Drivers.admin_reference', $reterive_key)
                      ->where('payment_opt',1)
                      ->orWhere('payment_opt',3)
                      ->sum('total');


        }else{
            $total = RequestModel::leftJoin('request_bill','request.id','=','request_bill.request_id')->where('request.is_paid',1)->sum('request_bill.total');

            $promo = RequestModel::leftJoin('request_bill','request.id','=','request_bill.request_id')->where('request.is_paid',1)->sum('request_bill.promo_amount');

            $referral = RequestModel::leftJoin('request_bill','request.id','=','request_bill.request_id')->where('request.is_paid',1)->sum('request_bill.referral_amount');

            $wallet = RequestModel::leftJoin('request_bill','request.id','=','request_bill.request_id')->where('request.is_paid',1)->sum('request_bill.wallet_amount');

            $card_payment = RequestModel::where('is_paid',1)->where('payment_opt',0)->sum('total');

            $cash_payment = RequestModel::where('is_paid',1)->where('payment_opt',1)->orWhere('payment_opt',3)->sum('total');

        }


        $total_payment = $total+$promo+$referral;

        $wallet_payment = $wallet;

        $payment_array = array('total'=>$total_payment,'card'=>$card_payment,'cash'=>$cash_payment,'wallet'=>$wallet_payment,);


        return view('payment::PaymentView',['result' => $requestData,'payment_array' => $payment_array,'request' => $request,'page'=>"payment_module",'title'=>$title]);
    }


}

