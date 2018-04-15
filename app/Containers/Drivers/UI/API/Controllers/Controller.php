<?php

namespace App\Containers\Drivers\UI\API\Controllers;

use App\Containers\Core\CoreController\CoreClass;
use App\Containers\Drivers\Actions\ApiDriverForgotPasswordAction;
use App\Containers\Drivers\Actions\ApiDriverLoginAction;
use App\Containers\Drivers\Actions\ApiDriverLogoutAction;
use App\Containers\Drivers\Actions\ApiDriverSignUpAction;
use App\Containers\Drivers\UI\API\Requests\DriverLoginRequest;
use App\Containers\Drivers\UI\API\Requests\DriverSignupRequest;
use App\Containers\Drivers\UI\API\Requests\HeroUpdateLocationRequest;
use App\Containers\Drivers\UI\API\Requests\HeroGetRequest;
use App\Containers\Drivers\UI\API\Requests\HeroResponseRequest;

use App\Containers\Drivers\Actions\ApiHeroLoginAction;
use App\Containers\Drivers\Actions\ApiHeroUpdateLocationAction;
use App\Containers\Drivers\Actions\ApiHeroGetRequestAction;
use App\Containers\Drivers\Actions\ApiHeroResponseAction;

use App\Containers\Drivers\UI\API\Transformers\DriverLoginTransformer;
use App\Containers\Drivers\UI\API\Transformers\HeroUpdateLocationTransformer;
use App\Containers\Drivers\UI\API\Transformers\HeroGetRequestTransformer;
use App\Containers\Drivers\UI\API\Transformers\HeroResponseTransformer;


use App\Containers\User\UI\API\Requests\ValidateMobile;
use App\Containers\User\UI\API\Transformers\ApiSocialUniqueIdTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Containers\Drivers\UI\API\Requests\DriverProfileUpdateRequest;
use App\Containers\Drivers\UI\API\Transformers\NewDriverLoginTransformer;

class Controller extends ApiController
{


    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        return  (new CoreClass())->get_core_file($request);
    }

    /**
     * @param \App\Containers\User\UI\API\Requests\RegisterUserRequest $request
     *
     * @return  mixed
     */
    public function logindriver(DriverLoginRequest $request)
    {

        $user = $this->call(ApiDriverLoginAction::class, [$request]);
        $message = trans('localization::errors.driver_logged');
        $obj = new \stdClass();
        $obj->message = $message;
        $obj->data = (object)$user;
        $data['response']=$obj;



        return $this->transform($data, NewDriverLoginTransformer::class);
    }


    /**
     * @param DriverSignupRequest $request
     * @return array
     */
    public function SignUpdriver(DriverSignupRequest $request)
    {

        $user = $this->call(ApiDriverSignUpAction::class, [$request]);


        $message = trans('localization::errors.driver_added');
        $obj = new \stdClass();
        $obj->message = $message;
        $obj->data = (object)$user;
        $data['response']=$obj;

        return $this->transform($data, NewDriverLoginTransformer::class);

    }

    /**
     * @param ValidateMobile $request
     * @return array
     */
    public function Forgotpassword(ValidateMobile $request)
    {

        $this->call(ApiDriverForgotPasswordAction::class, [$request]);
        $object=new \stdClass();
        $object->success="true";
        $object->message="forgot_password";
        return $this->transform($object, ApiSocialUniqueIdTransformer::class);
    }



    /**
     * @param Request $request
     * @return array
     */
    public function Logout(Request $request)
    {
        $this->call(ApiDriverLogoutAction::class, [$request]);
        $object=new \stdClass();
        $object->success="true";
        $object->message="Logged_out";
        return $this->transform($object, ApiSocialUniqueIdTransformer::class);
    }


    /**
     * @param HeroUpdateLocationRequest $request
     * @return array
     */
    public function updateLocationHero(HeroUpdateLocationRequest $request)
    {

        $user = $this->call(ApiHeroUpdateLocationAction::class, [$request]);


        return $this->transform($user, HeroUpdateLocationTransformer::class);
    }


    /**
     * @param HeroGetRequest $request
     * @return array
     */
    public function getRequestHero(HeroGetRequest $request)
    {
        $user = $this->call(ApiHeroGetRequestAction::class, [$request]);


        return $this->transform($user, HeroGetRequestTransformer::class);
    }


    /**
     * @param HeroResponseRequest $request
     * @return array
     */
    public function ResponseHero(HeroResponseRequest $request)
    {

        $user = $this->call(ApiHeroResponseAction::class, [$request]);


        if($request->is_accepted == 1){

            return $this->transform($user, HeroGetRequestTransformer::class);
        }
        else
        {
            return $this->transform($user, HeroResponseTransformer::class);
        }

    }

}
