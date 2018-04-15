<?php

namespace App\Containers\User\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as res;

/**
 * Class GetMyProfileRequest.
 */
class UserHistorySingleRequest extends Request
{

    /**
     * @return  array
     */
    public function rules(res $request)
    {

        return [

            'id' => 'required',
            'request_id' => 'required',
            'token' => 'required',

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
