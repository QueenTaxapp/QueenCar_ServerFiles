<?php

namespace App\Containers\User\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as res;

/**
 * Class GetMyProfileRequest.
 */
class ApiLoginRequest extends Request
{

    /**
     * @return  array
     */
    public function rules(res $request)
    {

        return [
            
            'username' => $request->login_method == 'manual'?'required':"",
            'password' => $request->login_method == 'manual'?'required|min:8|max:15':"",
            'device_token' => 'required',
            'login_by' => 'required|in:android,ios',
            'login_method' => 'required|in:manual,facebook,google',
            'social_unique_id' => $request->login_method != 'manual'?'required':"", 
           
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
