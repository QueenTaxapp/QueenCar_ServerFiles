<?php

    namespace App\Containers\User911\UI\WEB\Requests;

    use App\Ship\Parents\Requests\Request;

    use Illuminate\Http\Request as res;


    /**
     * Class UserAddRequest
     * @package App\Containers\User911\UI\WEB\Requests
     */
    class UserAddRequest extends Request
    {

        public function rules(res $request)
        {

         return [
            'firstName' => 'required',
            'lastName' => 'required',
            'adr' => '',
            'username'=>'required|unique:911_User',
            'email' => 'email|unique:911_User',
            'pass' => 'min:8|max:15',
            'phone_number' => 'required|mobile_number|unique:911_User',
            'avatar' => 'image|mimes:jpg,png,jpeg',
            ];

        }

        public function authorize()
        {
            return true;
        }
    }   
