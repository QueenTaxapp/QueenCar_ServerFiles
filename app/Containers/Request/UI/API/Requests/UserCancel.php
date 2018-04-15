<?php

namespace App\Containers\Request\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as res;

/**
 * Class GetMyProfileRequest.
 */
class UserCancel extends Request
{
    /**
     * @return  array
     */
    public function rules(res $request)
    {


        return [
            'request_id' => 'required',
            'reason' => 'required'
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