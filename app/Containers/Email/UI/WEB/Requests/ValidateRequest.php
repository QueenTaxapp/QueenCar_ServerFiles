<?php

namespace App\Containers\User911\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

use Illuminate\Http\Request as res;


/**
 * Class ValidateRequest
 * @package App\Containers\User911\UI\WEB\Requests
 */
class ValidateRequest extends Request
{

    public function rules(res $request)
    {
        return [
            'firstName'  => 'required',
            'lastName'  => 'required',
            'adr'  => '',
            'username'  => $request->old_username!=$request->username?'unique:911_User':"",
            'oldemail'  => 'required',
            'email'    => $request->oldemail!=$request->email?'email|unique:911_User':"",
            'phone_number' => $request->old_phone_number!=$request->phone_number?'required|mobile_number|unique:911_User':"",
            'avatar' => 'image|mimes:jpg,png,jpeg',
        ];
    }

    public function authorize()
    {
        return true;
    }
}