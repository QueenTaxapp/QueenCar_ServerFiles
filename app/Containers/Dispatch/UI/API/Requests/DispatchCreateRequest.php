<?php

namespace App\Containers\Dispatch\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;


/**
 *
 */
class DispatchCreateRequest extends Request
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
            'firstname'         => 'required',
            'lastname'          => 'required',
            'phone_number'      => 'required|mobile_number',
            'timezone'         => 'required',

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
