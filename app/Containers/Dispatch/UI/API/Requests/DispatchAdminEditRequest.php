<?php

namespace App\Containers\Dispatch\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;



class DispatchAdminEditRequest extends Request
{
    protected $urlParameters = [
        'id',
        'token',
        'firstname',
        'lastname',
        'address',
        'country',
        'postal_code',
        'emergency_number',
        'profile_pic',
        'old_password',
        'new_password'
    ];

    /**
     * @param Req $request
     * @return array
     */
    public function rules(Req $request)
    {


       return [
            'id'                => 'required',
            'token'             => 'required',
            'firstname'         => 'required',
            'lastname'          => 'required',
            'country'           => 'required',
            'postal_code'       => 'integer',
            'emergency_number'  => 'regex:/^[+][0-9]{10,14}$/',
            'profile_pic'       => 'mimes:jpg,png,jpeg',
            'old_password'      => ($request->has('new_password') ?  "required|min:8|max:15" : ''),
            'new_password'      => ($request->has('old_password') ?  "required|min:8|max:15" : ''),

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
