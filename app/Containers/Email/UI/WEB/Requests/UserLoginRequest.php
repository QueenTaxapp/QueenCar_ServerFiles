<?php

namespace App\Containers\User911\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class UserLoginRequest
 * @package App\Containers\User911\UI\WEB\Requests
 */
class UserLoginRequest extends Request
{


    public function rules()
    {
        return [
            'emailAddress'    => 'email',
            'password' => 'min:8|max:15',
        ];
    }

    public function authorize()
    {
        return true;
    }
}