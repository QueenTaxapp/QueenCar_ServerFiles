<?php

namespace App\Containers\Wallet\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class GetMyProfileRequest.
 */
class WalletAddRequest extends Request
{

    /**
     * @return  array
     */
    public function rules()
    {

        return [
           'card_id' => "required",
            "amount" => "required"
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
