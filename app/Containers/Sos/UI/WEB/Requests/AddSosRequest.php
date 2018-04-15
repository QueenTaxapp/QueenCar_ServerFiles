<?php

namespace App\Containers\Sos\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Res;

class AddSosRequest extends Request
{
    public function rules(Res $request)
    {

        if($request->action == 'modify')
        {

            if($request->old_number ==  $request->number)
            {
                $number = 'required|regex:/^[0-9]{1,15}$/';
            }
            else
            {

                $number = 'required|regex:/^[0-9]{1,15}$/|unique:Sos,number';
            }

        }
        else
        {
            $number = 'required|regex:/^[0-9]{1,15}$/|unique:Sos,number';
        }


        return [
            'name' => 'required',
            'number' => $number,
        ];

    }

    public function authorize()
    {
        return true;
    }
}
