<?php

namespace App\Containers\Drivers\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;




class DriverArrivedRequest extends Request
{

    public function rules(Req $request)
    {

        return [
            'id'    => 'required',
            'token' => 'required',
            'request_id'     => 'required',
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
