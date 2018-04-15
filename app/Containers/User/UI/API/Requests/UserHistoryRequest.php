<?php

namespace App\Containers\User\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as res;

/**
 * Class GetMyProfileRequest.
 */
class UserHistoryRequest extends Request
{

    /**
     * @return  array
     */
    public function rules(res $request)
    {

        return [

            'id' => 'required',
            'token' => 'required',
            'page' => ''

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
