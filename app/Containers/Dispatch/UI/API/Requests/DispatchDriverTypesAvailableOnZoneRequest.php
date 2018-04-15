<?php

namespace App\Containers\Dispatch\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;



class DispatchDriverTypesAvailableOnZoneRequest extends Request
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
            'latitude'=>'required',
            'longitude'=>'required',
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
