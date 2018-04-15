<?php

namespace App\Containers\Dispatch\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;


/**
 *
 */
class DispatchUserLoginRequest extends Request
{

    /**
     *
     */
    public function rules(Req $request)
    {

        return [

            'email_address'     => 'required',
            'password'          => 'required',
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
