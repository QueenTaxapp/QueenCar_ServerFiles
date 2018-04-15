<?php

namespace App\Containers\Zone\UI\WEB\Requests;
use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;
/**
 *
 */
class ZoneAddRequest extends Request
{
    public function rules(Req $request)
    {

      return [
        'zoneAdmin' => 'required',
        'currency' => 'required',
        'unit' => 'required|in:0,1',
        'name'=>'required'

      ];
    }

    public function authorize()
    {
        return true;
    }
}
