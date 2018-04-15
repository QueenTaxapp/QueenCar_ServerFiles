<?php

namespace App\Containers\User\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as res;


/**
 * Class ApiCreateRequest
 * @package App\Containers\User\UI\API\Requests
 */
class ApiFavPlaceRequest extends Request
{

    /**
     * @return  array
     */
    public function rules(res $request)
    {

        return [
            
            "nickName" => 'required',
            "placeId" => 'required',
            "latitude" => 'required',
            "longitude" => 'required'
           
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
