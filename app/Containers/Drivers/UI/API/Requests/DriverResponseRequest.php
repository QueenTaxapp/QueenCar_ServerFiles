<?php

namespace App\Containers\Drivers\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;


/**
 * Class DriverResponseRequest
 * @package App\Containers\Drivers\UI\API\Requests
 */
class DriverResponseRequest extends Request
{


    /**
     * @param Req $request
     * @return array
     */
    public function rules(Req $request)
    {
            return [
                'is_response' => 'numeric|required',
                'request_id' => 'numeric|required',
                'reason' => $request->is_response == 1?'':"required"

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
