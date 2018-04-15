<?php

namespace App\Containers\Settings\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;

class SettingsRequest extends Request
{
    public function rules(Req $request)
    {



        if($request->type == 'notification')
        {
            return [
                'send_sms' => 'required|in:0,1',
                'send_email'=> 'required|in:0,1'
            ];
        }
        else if($request->type == 'trip_settings')
        {
            return [
                'assign_method' => 'required|in:0,1',
                'driver_time_out'=>'required|numeric',
                'service_tax'=>'required|regex:/^\d*(\.\d{2})?$/',
                'wallet_min_amount_for_trip'=>'required|regex:/^\d*(\.\d{2})?$/',
                'wallet_min_amount_to_add'=>'required|regex:/^\d*(\.\d{2})?$/',
                'wallet_min_amount_to_balance'=>'required|regex:/^\d*(\.\d{2})?$/',
                'service_fee'=>'required|numeric',
                'auto_transfer'=> 'required|in:0,1'
            ];
        }
        else if($request->type == 'general')
        {

            return [
                'application_name' => 'required',
                'paginate'=>'required|numeric',
                'latitude'=>'required|latitude',
                'longitude'=>'required|latitude',
                'head_office_number'=>'required|contact_number',
                'help_email'=>'required|email',
                'time_zone'=>'required|time_zone',
                'dispatch_create_request'=> 'required|in:0,1'
            ];
        }
        else if($request->type == 'installation_settings')
        {
            return [

                'google_browser_key' => 'required',
                'twillo_account_sid' => 'required',
                'twillo_auth_token' => 'required',
                'twillo_number' => 'required|contact_number'

            ];
        }


    }

    public function authorize()
    {
        return true;
    }
}
