<?php

namespace App\Containers\Compliant\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;

class CompliantTypeRequest extends Request
{


    public function rules(Req $request)
    {

        $oldPassword = $request->has('new_password')?'required|min:8|max:15':'';

        $newPassword = $request->has('old_password')?'required|min:8|max:15':'';

        return [

                'type'         => 'required',
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
