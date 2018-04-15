<?php

namespace App\Containers\Admin\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;
/**
 *
 */
class AdminProfileUpdateRequest extends Request
{


    public function rules(Req $request)
    {



        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' =>$request->input('update',0)==0?'email|unique:Admin,email':"email",
            'password' => 'max:15',
            'address' => '',
            'country' => 'required',
            'pincode' => '',
            'timezone' => 'required',
            'phone_number' => $request->input('update',0)==0?'required|unique:Admin,phone_number|regex:/^[+]?[0-9]{10,14}$/':"required|regex:/^[+]?[0-9]{10,14}$/",
            //'avatar' => 'image|mimes:jpg,png,jpeg',
            'area_name'=> $request->role == 99999? "required" : "",
           
        ];
    }

    public function authorize()
    {
        return true;
    }
}