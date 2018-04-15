<?php

namespace App\Containers\Dispatch\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;
use App\Containers\Authentication\Providers\AppServiceProvider;
use Carbon\Carbon;




class DispatchRequestEditRequest extends Request
{


    public function rules(Req $request)
    {
        $currentDateTime = Carbon::now()->toDateTimeString();



        return [
            'id'                => 'required',
            'token'             => 'required',
            'request_id'        => 'required',
            'trip_start_time'   => "required|date|after:$currentDateTime",
            'pick_latitude'     => 'required|latitude',
            'pick_longitude'    => 'required|latitude',
            'drop_latitude'     => 'required|latitude',
            'drop_longitude'    => 'required|latitude',
            'pick_location'     => 'required',
            'drop_location'     => 'required',
            'type'              => 'required|integer',
            'user_phone_number' => 'required|mobile_number',
            'is_cancelled'      => 'required|in:0,1',
            'user_first_name'   => 'required',
            'user_last_name'    => 'required',

        ];


    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {

        return [
            'phone_number.required' => 'A name attribute is required',

        ];
    }

}
