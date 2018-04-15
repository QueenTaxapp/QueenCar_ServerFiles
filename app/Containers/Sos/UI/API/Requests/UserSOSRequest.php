<?php

namespace App\Containers\Sos\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;

class UserSOSRequest extends Request
{


    public function rules(Req $request)
    {

        return [
            'id'           => 'required',
            'token'        => 'required',
            'name'    => 'required',
            'phone_number'     => 'required',

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