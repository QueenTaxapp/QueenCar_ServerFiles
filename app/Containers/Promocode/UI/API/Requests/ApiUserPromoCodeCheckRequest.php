<?php

namespace App\Containers\Promocode\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as res;


/**
 * Class ApiUserPromoCodeCheckRequest
 * @package App\Containers\PromoCode\UI\API\Requests
 */
class ApiUserPromoCodeCheckRequest extends Request
{


    /**
     * @param res $request
     * @return array
     */
    public function rules(res $request)
    {

        return [
            
            'id'=>'required',
            'token'=>'required',
            'promo_code'=>'required',
            'request_id'=>'required',
           
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
