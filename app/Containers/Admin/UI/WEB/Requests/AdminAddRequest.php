<?php

namespace App\Containers\Admin\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;
/**
 *
 */
class AdminAddRequest extends Request
{


    public function rules(Req $request)
    {


        if($request->action == 'edit_modify')
        {




            return [
                'firstName' => 'required',
                'lastName' => 'required',
                'email'=> ($request->email == $request->old_email)?"email":"email|unique:Admin,email",
                'password' => 'min:8|max:15',
                'address' => '',
                'country' => 'required',
                'pincode' => '',
                'timezone' => 'required',
                'phone_number'=> ($request->phone_number == $request->old_phone_number)?"required|regex:/^[+][0-9]{10,14}$/":"required|regex:/^[+][0-9]{10,14}$/|unique:Admin,phone_number",
                'emergency_number'=> ($request->emergency_number == $request->old_emergency_number)?"required|regex:/^[+][0-9]{10,14}$/":"required|regex:/^[+][0-9]{10,14}$/|unique:Admin,emergency_number",
                'role' => $request->role == 99999? "required|unique:Admin,area_name" : "",

                //'area_name'=> ( ($request->area_name == $request->old_area_name) && ($request->old_area_name != null))?"required":"required|unique:Admin,area_name",

                ];
        }
        else
        {
            return [
                'firstName' => 'required',
                'lastName' => 'required',
                'email' =>$request->input('update',0)==0?'email|unique:Admin,email':"email",
                'password' => 'min:8|max:15',
                'address' => '',
                'country' => 'required',
                'pincode' => '',
                'timezone' => 'required',
                'phone_number' => $request->input('update',0)==0?'required|unique:Admin,phone_number|regex:/^[+][0-9]{10,14}$/':"required|regex:/^[+][0-9]{10,14}$/",
                'emergency_number' => $request->input('update',0)==0?'required|unique:Admin,emergency_number|regex:/^[+][0-9]{10,14}$/':"required|regex:/^[+][0-9]{10,14}$/",
                //'avatar' => 'image|mimes:jpg,png,jpeg',
                'role' => '',
                'area_name'=> $request->role == 99999? "required|unique:Admin,area_name" : "",
            ];
        }



    }

    public function authorize()
    {
        return true;
    }
}