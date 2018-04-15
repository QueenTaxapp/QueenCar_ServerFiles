<?php

namespace App\Containers\Drivers\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;

/**
 * Class RegisterUserRequest.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class DriverSignupRequest extends Request
{


    public function rules(Req $request)
    {
        return [
            'firstname' => 'required|regex:/^[a-zA-Z]+( [a-zA-Z]+)*$/',
            'lastname' => 'required|regex:/^[a-zA-Z]+( [a-zA-Z]+)*$/',
            'email'    => 'required|email|unique:Drivers,email|max:40',
            'phone' => 'required|mobile_number|unique:Drivers,phone_number',
            'password' => $request->input('login_method',0)=='manual'?'required|min:6|max:25':"",
            'device_token'     => 'required',
            'login_by'   => 'required|in:android,ios',
            'login_method'  => 'required|in:manual,facebook,google',
            'social_unique_id'  => $request->input('login_method',0)!='manual'?'required|unique:Drivers,social_unique_id':"",
            'profile_pic' => $request->profile_pic?'image|mimes:jpg,png,jpeg':"",
            'type' => 'required',
            'car_number' => 'required',
            'car_model' => 'required',
            'insurance' => $request->insurance?'image|mimes:jpg,png,jpeg':"",
            'insurance_name' => $request->insurance?'required|min:1':"",
            'insurance_date' => $request->insurance?'required':"",
            'license' => $request->license?'image|mimes:jpg,png,jpeg':"",
            'license_name' => $request->license?'required|min:1':"",
            'license_date' => $request->license?'required':"",
            'rcbook' => $request->rcbook?'image|mimes:jpg,png,jpeg':"",
            'rcbook_name' => $request->rcbook?'required|min:1':"",
            'rcbook_date' => $request->rcbook?'required':"",
            'admin_id'=> 'required',
        ];

    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }
}
