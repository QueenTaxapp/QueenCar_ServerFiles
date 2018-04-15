<?php

namespace App\Containers\Dispatch\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;


class DispatchSpecificAdminRequestListRequest extends Request
{


    /**
     * Class DispatchSpecificAdminRequestListRequest.
     *
     * @author Vignesh R
     */
    public function rules(Req $request)
    {



        $idName = trans('localization::lang_view.id');
        $idName = 'test';
        return [

            'id'        => "required",
            'token'     => 'required',
            'ride_later'=> 'required|in:1,0',
            'page'      => 'required|numeric|min:1',
            'search_key_user'   => '',
            'search_key_driver' => '',
            'search_key_trip_status' => ($request->search_key_trip_status != null ?  'in:1,2,3,4': ''),
            'search_key_payment_type' => ($request->search_key_payment_type != null ?  'in:0,1,2,3': ''),
            'search_key_payment_status' => ($request->search_key_payment_status != null ?  'in:0,1': ''),
            'search_key_from_date' => ($request->search_key_to_date != null ?  "required|date|before:$request->search_key_to_date": ''),
            'search_key_to_date' => ($request->search_key_from_date != null ?  'required|date': ''),


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
