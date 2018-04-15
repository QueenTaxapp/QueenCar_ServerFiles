<?php

namespace App\Containers\Compliant\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;

class CompliantsRequest extends Request
{

    public function rules(Req $request)
    {



        return [
            'id'=> 'required',
            'token'         => 'required',
            'title'         => 'required',
            'description'         => 'required|max:200',

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
