<?php

namespace App\Containers\Dispatch\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;
use App\Containers\Authentication\Providers\AppServiceProvider;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\PhoneNumber;
/**
 *
 */
class DispatchRideLaterRequest extends Request
{

    /**
     *
     */
    public function rules(Req $request)
    {




        return [
            'id'                => 'required',
            'token'             => 'required',
            'user_id'           => 'required',
            'platitude'         => 'required',
            'plongitude'        => 'required',
            'dlongitude'        => 'required',
            'dlatitude'         => 'required',
            'payment_opt'       => 'required',
            'type'              => 'required',
            'pick_location'     => 'required',
            'drop_location'     => 'required',
            'timezone'          => 'required',
            'datetime'          => 'required',
            'firstname'         => 'required',
            'lastname'          => 'required',
            'phone_number'      => 'required|mobile_number',


           // 'phone_number'      => 'test|required|is_odd_string|regex:/^[+][0-9]{10,14}$/',

        ];


    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {

        return [
            'phone_number.required' => 'A name attribute is required',

        ];
    }

}
