<?php

namespace App\Containers\Dispatch\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;


/**
 * Class CheckPhoneRequest
 * @package App\Containers\Drivers\UI\API\Requests
 */
class CheckPhoneRequest extends Request
{

    /**
     * @param Req $request
     * @return array
     */
    public function rules(Req $request)
    {

        return [

            'phone_number'     => 'required|mobile_number',
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
