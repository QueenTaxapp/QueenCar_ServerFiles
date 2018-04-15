<?php

namespace App\Containers\Admin\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;
/**
 *
 */
class AdminPrivilegeNameEditRequest extends Request
{


    public function rules(Req $request)
    {
        return [
            'type_name'    => $request->input('update',0)==0?'required|unique:AdminTypes,types':'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}