<?php

namespace App\Containers\Payment\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class GetMyProfileRequest.
 */
class PaymentDefaultRequest extends Request
{

    /**
     * @return  array
     */
    public function rules()
    {

        return [
           'card_id' => 'required'
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
