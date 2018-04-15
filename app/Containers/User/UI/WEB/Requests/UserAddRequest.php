<?php

namespace App\Containers\User\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

use Illuminate\Http\Request as res;

class UserAddRequest extends Request
{

    public function rules(res $request)
    {

         return [
             'firstName' => 'required',
             'lastName' => 'required',
             'email' =>$request->input('update',0)==0?'email|unique:User,email':"email",
             'password' => 'min:8|max:15',
             'gender' => 'required',
             'timezone'   => $request->input('update',0)==0?'required':"",
             'address' => '',
             'state' => '',
             'city' => '',
             'country_code' => $request->input('update',0)==0?'required':"",
             'phone_number' => $request->input('update',0)==0?'required|unique:User,phone_number|regex:/^[+][0-9]{8,15}$/':"required|regex:/^[+][0-9]{10,14}$/",
             'profile_pic' => 'image|mimes:jpg,png,jpeg',

            ];

    }

    public function authorize()
    {
        return true;
    }
}
