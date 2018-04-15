<?php

namespace App\Containers\Sos\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;

class UserZoneSOSRequest extends Request
{


    public function rules(Req $request)
    {

        return [
            'id'           => 'required',
            'token'        => 'required',
            'latitude'    => 'required',
            'longitude'     => 'required',

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