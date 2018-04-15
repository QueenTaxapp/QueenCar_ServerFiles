<?php

namespace App\Containers\Drivers\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;


class TripCancelledRequest extends Request
{

    public function rules(Req $request)
    {

        return [
            'id'    => 'required',
            'token' => 'required',
            'request_id'     => 'required',
            'reason' => 'required',
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
