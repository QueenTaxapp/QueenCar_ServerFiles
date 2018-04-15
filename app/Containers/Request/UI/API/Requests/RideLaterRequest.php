<?php

namespace App\Containers\Request\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as res;

/**
 * Class GetMyProfileRequest.
 */
class RideLaterRequest extends Request
{
    /**
     * @return  array
     */
    public function rules(res $request)
    {


        return [
            "platitude" =>  "required",
            "plongitude" =>  "required",
            "dlongitude" =>  "required",
            "dlatitude" =>  "required",
            "paymentOpt" =>  "required",
            "type" =>  "required",
            "timezone" => "required",
            "datetime" => "required"
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
