<?php

namespace App\Containers\Drivers\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Res;

class DriverAddRequest extends Request
{
    public function rules(Res $request)
    {

        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => $request->input('update',0)==0?'email|unique:Drivers,email':"email",
            'password' => 'min:8|max:15',
            'type' => 'required',
            'gender' => 'required',
            'address' => '',
            'state' => '',
            'city' => '',
            'country_code' => 'required',
            'phone_number' => $request->input('update',0)==0?'required|mobile_number|unique:Drivers,phone_number':"required|mobile_number",
            'profile_pic' =>  'image|mimes:jpg,png,jpeg',
        ];

    }

    public function authorize()
    {
        return true;
    }
}
