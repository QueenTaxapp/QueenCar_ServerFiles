<?php

namespace App\Containers\Referral\UI\WEB\Controllers;
use App\Containers\Common\GetConfigs;
use App\Containers\Request\Models\RequestModel;
use App\Containers\Types\Models\Types;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

/**
 * Class Controller
 * @package App\Containers\Admin\UI\WEB\Controllers
 */
class Controller extends WebController
{

    public function adminReferralViewPage(Request $request)
    {
         //echo "<pre>";print_r("welcome Referral");die();
        $paginate = GetConfigs::getConfigs('paginate');

        $title = trans('localization::lang_view.referral');

        $requestData = UserTableModel::leftjoin('referral','User.id','=','referral.user_id')

            ->select(
                'User.firstname as ufname',
                'User.lastname as ulname',
                'referral.code',
                'referral.amount_earned',
                'referral.amount_spent'

            )
            ->paginate($paginate);

        $total_earned = UserTableModel::leftjoin('referral','User.id','=','referral.user_id')->sum('referral.amount_earned');
        $total_spent = UserTableModel::leftjoin('referral','User.id','=','referral.user_id')->sum('referral.amount_spent');


        $payment_array = array('total_earned'=>$total_earned,'total_spent'=>$total_spent);


        return view('referral::ReferralView',['result' => $requestData,'payment_array' => $payment_array,'request' => $request,'page'=>"referral_module",'title'=>$title]);
    }


}

