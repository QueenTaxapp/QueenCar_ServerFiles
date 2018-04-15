<?php

namespace App\Containers\Referral\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class GetMyProfileRequest.
 */
class ApiRefferalCheckRequest extends Request
{

    /**
     * @return  array
     */
    public function rules()
    {

        return [
            
          "referral_code" => 'required',
           
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
