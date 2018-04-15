<?php

namespace App\Containers\Payment\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class GetMyProfileRequest.
 */
class PaymentToken extends Request
{

    /**
     * @return  array
     */
    public function rules()
    {

        return [
           'payment_id' => 'required',
            'last_number' => 'required'
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
