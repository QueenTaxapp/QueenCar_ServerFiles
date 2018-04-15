<?php

namespace App\Containers\Eta\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class GetMyProfileRequest.
 */
class EtaRequest extends Request
{

    /**
     * @return  array
     */
    public function rules()
    {

        return [
           'type_id' => 'required',
            'olat' => 'required',
            'olng' => 'required',
            'dlat' => 'required',
            'dlng' => 'required',
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
