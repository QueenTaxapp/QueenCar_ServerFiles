<?php

namespace App\Containers\User\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as res;


/**
 * Class ApiCreateRequest
 * @package App\Containers\User\UI\API\Requests
 */
class ApiCreateRequest extends Request
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
