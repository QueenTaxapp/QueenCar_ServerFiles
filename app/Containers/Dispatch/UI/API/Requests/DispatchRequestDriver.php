<?php

namespace App\Containers\Dispatch\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;


class DispatchRequestDriver extends Request
{
    /**
     * @param Req $request
     * @return array
     */
    public function rules(Req $request)
    {

        return [

            'id'     => 'required',
            'token'  => 'required',
            'request_id'=>'required',
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
