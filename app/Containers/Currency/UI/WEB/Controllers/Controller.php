<?php

namespace App\Containers\Currency\UI\WEB\Controllers;

use App\Containers\Admin\Webtasks\Message;
use App\Containers\Common\GetConfigs;
use App\Containers\Currency\Models\CommonCurrencyModel;
use App\Containers\Promocode\Webtasks\PromoSearchTask;
use App\Containers\Promocode\Webtasks\PromoViewTask;
use App\Containers\Zone\Models\ZoneModel;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Containers\Company\Webtasks\ReportDownloadTask;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

/**
 * Class Controller
 * @package App\Containers\Admin\UI\WEB\Controllers
 */
class Controller extends WebController
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function adminCurrencyView(Request $request)
    {
        $paginate = GetConfigs::getConfigs('paginate');

        $currency = CommonCurrencyModel::select('*')->orderBy('id','desc')->paginate($paginate);
        //$promo =(object)$promo;

        $title = trans('localization::title.currency');
        // $ =AdminModel::get();
        $page = "currency_module";
        return view('currency::CurrencyView',['currency' =>$currency,'request'=>$request, 'title'=>$title, 'page'=> $page]);

    }

    public function adminCurrencyAdd(Request $request)
    {
       // echo "<pre>";print_r("wrks");die();

        $currency_list = json_decode(file_get_contents(public_path('Common-Currency.json')),true);

    //echo "<pre>";print_r($currency);die();
        $title = trans('localization::title.currency');
        // $ =AdminModel::get();
        $page = "currency_module";
        return view('currency::CurrencyAdd',['request'=>$request,'currency_list'=>$currency_list, 'title'=>$title, 'page'=> $page]);

    }


    public function adminCurrencyAddSave(Request $request)
    {
//echo "<pre>";print_r($request->all());die();

        $currency = new CommonCurrencyModel();

        $currency->name          = $request->currency_name;
        $currency->symbol        = $request->symbol;
        $currency->standard_name = $request->standard_name;
        $currency->status        = 1;

        $currency->save();

        $currency_array = array('success'=>"TRUE",'message'=>trans('localization::errors.currency_added_successfully'));
        $request->session()->flash('success', $currency_array);
        return Redirect::to("/admin/currency/view");

    }


    public function adminCurrencyEdit(Request $request)
    {
       // echo "<pre>";print_r($request->all());die();
        $currency_list = json_decode(file_get_contents(public_path('Common-Currency.json')),true);

        $id = $request->id;
        $currency = CommonCurrencyModel::where('id',$id)->first();

        $title = trans('localization::title.currency');
        // $ =AdminModel::get();
        $page = "currency_module";
        return view('currency::CurrencyEdit',['currency' =>$currency,'currency_list'=>$currency_list,'request'=>$request, 'title'=>$title, 'page'=> $page]);

    }


    public function adminCurrencyUpdate(Request $request)
    {
        //echo "<pre>";print_r($request->all());die();

        $id = $request->id;
        $currency = CommonCurrencyModel::find($id);

        $currency->name          = $request->currency_name;
        $currency->symbol        = $request->symbol;
        $currency->standard_name = $request->standard_name;

        $currency->save();

        $currency_array = array('success'=>"TRUE",'message'=>trans('localization::errors.currency_updated_successfully'));
        $request->session()->flash('success', $currency_array);

        return Redirect::to("/admin/currency/view");

    }

    public function adminCurrencyDelete(Request $request)
    {
       // echo "<pre>";print_r($request->all());die();
        $currency = CommonCurrencyModel::where('id',$request->id)->delete();

        $currency_array = array('success'=>"TRUE",'message'=>trans('localization::errors.currency_deleted_successfully'));
        $request->session()->flash('success', $currency_array);

        return Redirect::to("/admin/currency/view");

    }

    public function adminCurrencyToggle(Request $request)
    {

        $currency = CommonCurrencyModel::where('id',$request->id)->first();

        $old_status=$currency->status;

        if($old_status==0){
            $currency->status=1;
            $currency_array = array('success'=>"TRUE",'message'=>trans('localization::errors.currency_active_successfully'));
        }
        elseif($old_status==1)
        {
            $currency->status=0;
            $currency_array = array('success'=>"TRUE",'message'=>trans('localization::errors.currency_inactive_successfully'));
        }

        $currency->save();
        //echo "<pre>";print_r( $promo->state);die();

        $request->session()->flash('success', $currency_array);
        return Redirect::to("/admin/currency/view");

    }



}

