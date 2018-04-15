<?php

namespace App\Containers\Drivers\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;

/**
 * Class RegisterUserRequest.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class DriverLoginRequest extends Request
{


    public function rules(Req $request)
    {
        
            return [
                'username'    => $request->input('login_method',0)=='manual'?'required|max:40':"",
                'password' => $request->input('login_method',0)=='manual'?'required|min:6|max:25':"",
                'device_token'     => 'required',
                'login_by'   => 'required|in:android,ios',
                'login_method'  => 'required|in:manual,facebook,google',
                'social_unique_id'  => $request->input('login_method',0)!='manual'?'required':"",
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
