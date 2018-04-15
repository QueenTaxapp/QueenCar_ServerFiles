<?php

namespace App\Containers\Request\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as res;

/**
 * Class GetMyProfileRequest.
 */
class BillRequest extends Request
{
    /**
     * @return  array
     */
    public function rules(res $request)
    {


        return [
            'id' => 'required',
            'token' => 'required',
            'request_id' => 'required',
            'distance' => 'required',
            'before_waiting_time' => 'required',
            'after_waiting_time' => 'required',
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
