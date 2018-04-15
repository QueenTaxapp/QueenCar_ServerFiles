<?php

namespace App\Containers\Compliant\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Res;

class CompliantEditRequest extends Request
{
    public function rules(Res $request)
    {
      return [
            'title' => 'required',
            'description' => 'required|max:200',
            'id' => 'required'
        ];

    }

    public function authorize()
    {
        return true;
    }
}
