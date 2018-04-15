<?php

namespace App\Containers\Promocode\ApiTask;

use App\Ship\Exceptions\CommonException;

use App\Containers\Compliant\Models\UserCompliantModel;

use App\Containers\Promocode\Models\PromocodeModel;
use Carbon\Carbon;
use App\Containers\Promocode\Models\PromoCodeHistoryModel;
use App\Containers\Request\Models\RequestModel;


class UserPromoCodeCheckTask
{

    public function run($data, $custom_parameter)
    {


        $request = $data['request'];

        $id = $data['request']->id;

        $promoCode = $data['request']->promo_code;


        $promoZoneCheck = RequestModel::join('zone_type','request.type','=','zone_type.id')
            ->select('request.id','zone_type.zone_id')
            ->where('request.id',$request->request_id)->first();

        $promoCode = PromocodeModel::select('id','zone_id','coupon_code','uses','state','start_date','expiry_date')
            ->where('coupon_code',$promoCode)
            ->orderBy('id', 'desc')->first();


        if($promoCode->zone_id != 0 && $promoZoneCheck->zone_id != $promoCode->zone_id){

            throw (new CommonException())->setValue('813',trans('localization::errors.813'));
        }


        // check promocode exist
        if(count($promoCode) <= 0)
        {
            throw (new CommonException())->setValue('811',trans('localization::errors.811'));

        }

        // check promo code active or in active

        if($promoCode->state != 1)
        {
            throw (new CommonException())->setValue('813',trans('localization::errors.813'));

        }


        // promo code valid or invalid
        $first   = Carbon::parse($promoCode->start_date);
        $second  = Carbon::parse($promoCode->expiry_date);

        $Valid = Carbon::now()->between($first, $second);

        if(!$Valid)
        {
            throw (new CommonException())->setValue('812',trans('localization::errors.812'));

        }

        // no of user used (offer reached max limit or not)

        $PromoCodeCount = PromoCodeHistoryModel::select('id')->where('promo_code_id','=',$promoCode->id)->count();


        if($PromoCodeCount >= $promoCode->uses)
        {
            throw (new CommonException())->setValue('814',trans('localization::errors.814'));

        }

            $PromoCodeHistory = new PromoCodeHistoryModel;

            $PromoCodeHistory->request_id = $request->request_id;
            $PromoCodeHistory->promo_code_id = $promoCode->id;
            $PromoCodeHistory->user_id = $id;

        $PromoCodeHistory->save();


        RequestModel::where('id',$request->request_id)
            ->update(['promo_id'=>$promoCode->id]);



        $message = 'Thank you! Enjoy this ride';
        $obj = new \stdClass();
        $obj->message = $message;
        $data['response']=$obj;
        return $data;

    }
}