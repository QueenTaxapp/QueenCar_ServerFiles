<?php

namespace App\Containers\Drivers\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Drivers\Models\HeroModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiHeroSocialSignUpTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $social_id = $request->social_unique_id;

//echo($social_id);die();
            $firstName = $request->firstname;
            $lastName = $request->lastname;
            $email = $request->email;
            $phone = $request->phone;
            $username = $request->username;

            $login_method = $request->login_method;
            $login_by = $request->login_by;
            $device_token = $request->device_token;
            $type =  $request->type;

        $hero = new HeroModel();

            $hero->firstname = $firstName;
            $hero->lastname = $lastName;
            $hero->email = $email;
            $hero->phone_no =$phone;
            $hero->username = $username;
            $hero->password = "Null";
            $hero->login_method = $login_method;
            $hero->login_by = $login_by;
            $hero->device_token = $device_token;
            $hero->social_unique_id = $social_id;



            if($request->hasFile('profile_pic')){

                $destinationPath = public_path()."/assets/img/uploads";
                $extension =  $request->file('profile_pic')->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension; // renaming image
                if(!$request->file('profile_pic')->move($destinationPath,$fileName))
                {
                     die('failed upload');
                }

                $hero->profile_pic = asset("assets/img/uploads")."/".$fileName;
            }

            $randomNumber = time();
            $randomNumber .= rand();
            $randomNumber = Hash::make($randomNumber);

            $hero->token = $randomNumber;
            $hero->token_expiry = date("Y-m-d h:i:s", strtotime("+2 day"));
            $hero->is_active = 0;
            $hero->is_approve = 0;
            $hero->type = $type;


            $hero->save();


            $response = array('success'=>"True",'message'=>"SignUp Success");

            $heroes=HeroModel::where('email',$request->email)->orWhere('social_unique_id', $social_id)->first();


        return $heroes;

    }

}