<?php

namespace App\Containers\Promocode\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;
/**
 *
 */
class PromocodeAddRequest extends Request
{


    public function rules(Req $request)
    {
        return [
            //
        ];
    }

    public function authorize()
    {
        return true;
    }
}