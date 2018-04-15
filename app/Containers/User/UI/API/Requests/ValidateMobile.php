<?php

namespace App\Containers\User\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as res;


/**
 * Class ValidateMobile
 * @package App\Containers\User\UI\API\Requests
 */
class ValidateMobile extends Request
{

    /**
     * @return  array
     */
    public function rules(res $request)
    {

        return [
            
            'phone_number' => 'required|regex:/^[+]?\d{10,14}$/'
           
        ];
    }

    /**
     * @return  bool
     */
    public function authorize(res $request)
    {
        return true;
    }
}
