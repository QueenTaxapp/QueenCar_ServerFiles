<?php

namespace App\Containers\Promocode\UI\WEB\Controllers;

use App\Containers\Admin\Webtasks\AdminViewTask;
use App\Containers\Admin\Webtasks\Message;
use App\Containers\Admin\Webtasks\SearchTask;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Promocode\Models\PromocodeModel;
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

    public function adminPromoView(Request $request)
    {
        //print_r($request->all());die();
        $request->session()->put('filter_type',"");
        $request->session()->put('filter_value',"");
        $user="";

        if($request->has('filter_type') && ($request->has('filter_value') || $request->has('filter_value_select'))){

            $user = $this->call(PromoSearchTask::class, [$request]);

            if($request->submit && $request->submit == 'Download_Report')
            {

                $heading = array(
                    trans('localization::lang_view.coupon_code'),
                    trans('localization::lang_view.value'),
                    trans('localization::lang_view.type'),
                    trans('localization::lang_view.uses'),
                    trans('localization::lang_view.status'),
                    trans('localization::lang_view.start_date'),
                    trans('localization::lang_view.expiry_date')
                );

                $key = array('coupon_code','value','type','uses','status','start_date','expiry');

                $title = trans('localization::lang_view.proco_code_report');

                $value = $user;
                $this->call(ReportDownloadTask::class, [$heading,$value,$key,$title]);
            }
        }
        else {
            $user = $this->call(PromoViewTask::class,[$request]);
        }

        // $page = GetConfigs::getConfigs('paginate');
        //$promo =PromocodeModel::select('*')->paginate($page);
        //$promo =(object)$promo;

        $title = trans('localization::title.promo_code');
        // $ =AdminModel::get();
        $page = "promo_module";
        return view('promocode::PromoView',['promo' =>$user,'request'=>$request, 'title'=>$title, 'page'=> $page]);

    }

    public function adminPromoAdd(Request $request)
    {
        $zone = ZoneModel::where('is_active',1);

        $reterive_key = ApiHelper::reterive_key();

        if($reterive_key != 0)
        {

            $promo_admin_key = $reterive_key;

            $zone = $zone->where('admin_reference',$reterive_key);

        }else{
            $promo_admin_key = 0;

            throw new ValidationException((new Message()),redirect()->to('admin/promo/view')
                ->withErrors([trans('localization::errors.only_admins_or_sub_admins_add_promo_code')], 'default'));
        }


        $zone = $zone->get();

        $title = trans('localization::title.admin');
        // $ =AdminModel::get();
        $page = "promo_module";
        return view('promocode::PromoAdd',['promo_admin_key'=>$promo_admin_key,'request'=>$request,'zone'=>$zone, 'title'=>$title, 'page'=> $page]);

    }


    public function adminPromoAddSave(Request $request)
    {
//echo "<pre>";print_r($request->all());die();

        $promo=new PromocodeModel();
        $promo->admin_reference=$request->promoAdmin;
        $promo->zone_id=$request->zone;
        $promo->coupon_code=$request->couponCode;
        $promo->value=$request->value;
        $promo->type=$request->type;
        $promo->uses=$request->uses;
        $promo->state=0;
        $str_date=date_create($request->startDate);
        $start_date=date_format($str_date,"Y-m-d 00:00:00");
        $promo->start_date=$start_date;

        $ed_date=date_create($request->expiryDate);
        $end_date=date_format($ed_date,"Y-m-d 23:59:59");
        $promo->expiry_date=$end_date;
        $promo->save();

        $promo_array = array('success'=>"TRUE",'message'=>trans('localization::errors.promo_code_added_successfully'));
        $request->session()->flash('success', $promo_array);
        return Redirect::to("/admin/promo/view");

    }


    public function adminPromoEdit(Request $request)
    {
        $zone = ZoneModel::where('is_active',1);

        $reterive_key = ApiHelper::reterive_key();

        if($reterive_key != 0)
        {

            $promo_admin_key = $reterive_key;

            $zone = $zone->where('admin_reference',$reterive_key);

        }else{
            $promo_admin_key = 0;

            throw new ValidationException((new Message()),redirect()->to('admin/promo/view')
                ->withErrors([trans('localization::errors.only_admins_or_sub_admins_edit_promo_code')], 'default'));
        }

        $zone = $zone->get();

        $promo =DB::table('Promo_code')->where('id',$request->id)->first();
        $promo =(object)$promo;

        $title = trans('localization::title.admin');
        // $ =AdminModel::get();
        $page = "promo_module";
        return view('promocode::PromoEdit',['promo_admin_key' =>$promo_admin_key,'promo' =>$promo,'zone' =>$zone,'request'=>$request, 'title'=>$title, 'page'=> $page]);

    }

    public function adminPromoUpdate(Request $request)
    {

        $promo =PromocodeModel::find($request->id);
        $promo->admin_reference=$request->promoAdmin;
        $promo->zone_id=$request->zone;
        $promo->coupon_code=$request->couponCode;
        $promo->value=$request->value;
        $promo->type=$request->type;
        $promo->uses=$request->uses;
        $str_date=date_create($request->startDate);
        $start_date=date_format($str_date,"Y-m-d 00:00:00");
        $promo->start_date=$start_date;

        $ed_date=date_create($request->expiryDate);
        $end_date=date_format($ed_date,"Y-m-d 23:59:59");
        $promo->expiry_date=$end_date;
        $promo->save();


        $promo_array = array('success'=>"TRUE",'message'=>trans('localization::errors.promo_code_updated_successfully'));
        $request->session()->flash('success', $promo_array);
        return Redirect::to("/admin/promo/view");

    }

    public function adminPromoDelete(Request $request)
    {

        $promo =PromocodeModel::where('id',$request->id)->delete();


        $promo_array = array('success'=>"TRUE",'message'=>trans('localization::errors.promo_code_deleted_successfully'));
        $request->session()->flash('success', $promo_array);
        return Redirect::to("/admin/promo/view");

    }

    public function adminPromoActive(Request $request)
    {

        $promo =PromocodeModel::where('id',$request->id)->first();

        $old_state=$promo->state;
        if($old_state==0){
            $promo->state=1;
            $promo_array = array('success'=>"TRUE",'message'=>trans('localization::errors.promo_code_active_successfully'));
        }
        elseif($old_state==1)
        {
            $promo->state=0;
            $promo_array = array('success'=>"TRUE",'message'=>trans('localization::errors.promo_code_inactive_successfully'));
        }

        $promo->save();
        //echo "<pre>";print_r( $promo->state);die();

        $request->session()->flash('success', $promo_array);
        return Redirect::to("/admin/promo/view");

    }



}

