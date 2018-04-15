<?php

namespace App\Containers\User\UI\API\Requests;

use Illuminate\Http\Request as res;
use App\Containers\Common\ApiHelper;
use App\Ship\Parents\Requests\Request;

/**
 * Class GetMyProfileRequest.
 */
class ApiSignupRequest extends Request
{


    /**
     * @return  array
     */
    public function rules(res $request)
    {

      ApiHelper::api_user_language();
        return [

            'firstname' => 'required|regex:/^[a-zA-Z]+( [a-zA-Z]+)*$/',
            'lastname' => 'required|regex:/^[a-zA-Z]+( [a-zA-Z]+)*$/',
            'email' => 'required|email|unique:User',
            'phone_number' => 'required|regex:/^[+]?\d{10,14}$/|unique:User',
            'password' => $request->login_method == 'manual'?'required|min:8|max:15':"",
            'login_method' => 'required|in:manual,facebook,google',
            'login_by' => 'required|in:android,ios',
            'profile_pic' => $request->profile_pic?'image|mimes:jpg,png,jpeg':"",
            'device_token' =>'required',
            'country_code' =>'required',
            'social_unique_id'=> $request->login_method != 'manual'?'required|unique:User':"",
            'time_zone' => 'required',

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
