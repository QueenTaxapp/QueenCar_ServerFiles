<?php

namespace App\Containers\Referral\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class GetMyProfileRequest.
 */
class emptyRequest extends Request
{

    /**
     * @return  array
     */
    public function rules()
    {

        return [
           
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
