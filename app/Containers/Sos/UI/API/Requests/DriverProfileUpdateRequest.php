<?php

namespace App\Containers\Drivers1\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;

class DriverProfileUpdateRequest1 extends Request
{


    public function rules(Req $request)
    {

        $oldPassword = $request->has('new_password')?'required|min:8|max:15':'';

        $newPassword = $request->has('old_password')?'required|min:8|max:15':'';

        return [
                'id'           => 'required',
                'token'        => 'required',
                'firstname'    => 'required|regex:/^[a-zA-Z]+$/',
                'lastname'     => 'required|regex:/^[a-zA-Z]+$/',
                'new_password' => $newPassword,
                'old_password' => $oldPassword,
                'profile_pic'  => 'image|mimes:jpg,png,jpeg',
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
