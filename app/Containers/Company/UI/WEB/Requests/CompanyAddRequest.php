<?php

namespace App\Containers\Company\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;

class CompanyAddRequest extends Request
{


    public function rules(Req $request)
    {

        $document_name  = ($request->has('document')) ? 'required' :'';

        $document  = ($request['document_name'] ==  '') ? '' :'required|mimes:jpg,png,jpeg,pdf';

        if( $request->has('submit') &&  $request->get('submit') == 'add')
        {
            $landLine = ($request->landline_number == '') ? '' :'land_line|unique:Company,landline_number';
         //   $pinCode = ($request->pincode == '') ? '' :'integer';
            return [
                'company_name' => 'required',
                'name' => 'required|alpha',
                'phone_number' => 'required|mobile_number|unique:Company,phone_number',
                'landline_number'=> $landLine,
                'email' =>'required|email|unique:Company,email',
                'vat'=>'required|regex:/^[^\W_]+$/|unique:Company,vat',
                'password' => 'min:8|max:15|required',
                'address' => '',
                'country' => '',
                'pincode' => '',
                'document' => $document,
                'document_name'=>$document_name,
                'profile_pic' => 'mimes:jpg,png,jpeg',
            ] ;
        }
        else 
        {
            
             $email  = ($request->email ==  $request->old_email) ? 'required' :'required|email|unique:Company,email';
             $phone_number  = ($request->phone_number ==  $request->old_phone_number) ? 'required' :'required|unique:Company,phone_number|regex:/^[+]?[0-9]{10,14}$/';
             $vat = ($request->vat ==  $request->old_vat) ? 'required' :'required|regex:/^[^\W_]+$/|unique:Company,vat';
             $landline_number = ($request->landline_number ==  $request->old_landline_number) ? 'required' :'required|regex:/^[0-9]{5,15}$/|unique:Company,landline_number';


            return [
                'company_name' => 'required',
                'name' => 'required',
                'phone_number' => $phone_number,
                'landline_number'=>$landline_number,
                'email' =>$email,
                'vat'=> $vat,
                'address' => '',
                'country' => '',
                'pincode' => 'integer',
                'document' => 'mimes:jpg,png,jpeg,pdf',
             ];
        }


    }

    public function authorize()
    {
        return true;
    }
}