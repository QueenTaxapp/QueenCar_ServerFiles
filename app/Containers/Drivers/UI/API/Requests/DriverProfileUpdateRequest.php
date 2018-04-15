<?php

namespace App\Containers\Drivers\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;

class DriverProfileUpdateRequest extends Request
{


    public function rules(Req $request)
    {

        $oldPassword = $request->has('new_password')?'required|min:6|max:25':'';

        $newPassword = $request->has('old_password')?'required|min:6|max:25':'';

        return [
                'id'           => 'required',
                'token'        => 'required',
                'firstname'    => 'required|regex:/^[a-zA-Z]+( [a-zA-Z]+)*$/',
                'lastname'     => 'required|regex:/^[a-zA-Z]+( [a-zA-Z]+)*$/',
                'new_password' => $newPassword,
                'old_password' => $oldPassword,
                'profile_pic'  => 'image|mimes:jpg,png,jpeg',
               ];
///([a-z] ?)+[a-z]/ /^[a-zA-Z]+$/
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }
}
