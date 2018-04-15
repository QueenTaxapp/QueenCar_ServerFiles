<?php

namespace App\Containers\Dispatch\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;


class DispatchManualAcceptRequest extends Request
{


    public function rules(Req $request)
    {

        return [

            'id'             => 'required',
            'token'          => 'required',
            'request_id'     => 'required',
            'driver_id'      => 'required',
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
