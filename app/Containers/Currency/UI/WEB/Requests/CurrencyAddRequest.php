<?php

namespace App\Containers\Currency\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;
/**
 *
 */
class CurrencyAddRequest extends Request
{


    public function rules(Req $request)
    {
        return [
            'currency_name' => 'required',
            'symbol' => 'required',
            'standard_name' =>'required',

        ];
    }

    public function authorize()
    {
        return true;
    }
}