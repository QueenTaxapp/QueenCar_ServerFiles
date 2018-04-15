<?php

namespace App\Containers\Promocode\UI\API\Controllers;


use App\Containers\Core\CoreController\CoreClass;
use App\Containers\User\Actions\ApiLogoutAction;
use App\Containers\User\Actions\ApiRefreshToken;
use App\Containers\User\Actions\ForgotPasswordAction;
use App\Containers\User\Actions\SendOtpAction;
use App\Containers\User\Actions\TempTokenAction;
use App\Containers\User\UI\API\Requests\ValidateMobile;
use App\Containers\User\UI\API\Transformers\TempToken;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Containers\User\UI\API\Requests\ApiLoginRequest;
use App\Containers\User\UI\API\Requests\ApiSignupRequest;
use App\Containers\User\Actions\ApiLoginAction;
use App\Containers\User\Actions\ApiUserSignupAction;
use App\Containers\User\UI\API\Transformers\ApiLoginTransformer;
use App\Containers\User\UI\API\Transformers\ApiSignupTransformer;
use App\Containers\User\Actions\ApiUserOtpValidateAction;
use App\Containers\User\Actions\ApiSocialUniqueIdCheckAction;
use App\Containers\User\UI\API\Transformers\ApiSocialUniqueIdTransformer;
use App\Containers\User\Actions\ApiUserResendOtpAction;
use App\Containers\User\UI\API\Requests\ApiSocialUniqueIdRequest;
use App\Containers\User\UI\API\Requests\ApiUserOtpValidateRequest;


/**
 * Class Controller
 * @package App\Containers\User\UI\API\Controllers
 */
class Controller extends ApiController
{



    public function run(Request $request)
    {

        return  (new CoreClass())->get_core_file($request);
    }


    /**
     *
     * @param Request $request
     * @return array
     */
    public function SendTempKey(Request $request)
    {

        $token = $this->call(TempTokenAction::class, [$request]);
        $object=new \stdClass();
        $object->token=$token;
        $object->message="Token_Created";
        return $this->transform($object, TempToken::class);

    }


    /**
     * @param ValidateMobile $request
     * @return array
     */
    public function SendOtpTemp(ValidateMobile $request)
    {

        $token = $this->call(SendOtpAction::class, [$request]);

        if($token)
        {
            $object=new \stdClass();
            $object->token=$token;
            $object->message="New_User";
            return $this->transform($object, TempToken::class);
        }
        else{
            $object=new \stdClass();
            $object->success="true";
            $object->message="Existing_User";
            return $this->transform($object, ApiSocialUniqueIdTransformer::class);
        }


    }


    /**
     * @param ApiLoginRequest $request
     * @return array
     */
    public function userLogin(ApiLoginRequest $request)
    {      
        
        $result = $this->call(ApiLoginAction::class, [$request]);
        $result->message="User_Logged";
        return $this->transform($result, ApiLoginTransformer::class);
   
    }


    /**
     * @param ApiSignupRequest $request
     * @return array
     */
    public function userSignup(ApiSignupRequest $request)
    {      

        $result = $this->call(ApiUserSignupAction::class, [$request]);
        $result->message="Registered_Successfully";
        return $this->transform($result, ApiSignupTransformer::class);
   
    }


    /**
     * @param Request $request
     * @return array
     */
    public function userOtpValidate(Request $request)
    {      

        $token = $this->call(ApiUserOtpValidateAction::class, [$request]);
        $object=new \stdClass();
        $object->token=$token;
        $object->message="Otp_Validate";
        return $this->transform($object, TempToken::class);
   
    }


    /**
     * @param ApiSocialUniqueIdRequest $request
     * @return array
     */
    public function userSocialCheck(ApiSocialUniqueIdRequest $request)
    {      

        $result = $this->call(ApiSocialUniqueIdCheckAction::class, [$request]);
        $result->message="Checked_SocialUniqueId";
        return $this->transform($result, ApiSocialUniqueIdTransformer::class);
   
    }


    /**
     * @param Request $request
     * @return array
     */
    public function userResendOtp(Request $request)
    {      
        $token = $this->call(ApiUserResendOtpAction::class, [$request]);
        $object=new \stdClass();
        $object->token=$token;
        $object->message="Resend_Otp";
        return $this->transform($object, TempToken::class);
    }


    /**
     * @param ValidateMobile $request
     * @return array
     */
    public function forgotPassword(ValidateMobile $request)
    {
        $this->call(ForgotPasswordAction::class, [$request]);
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

        $this->call(ApiLogoutAction::class, [$request]);
        $object=new \stdClass();
        $object->success="true";
        $object->message="User_Loggedout";
        return $this->transform($object, ApiSocialUniqueIdTransformer::class);
    }


    /**
     * @param Request $request
     * @return array
     */
    public function RefreshToken(Request $request)
    {
        
        $user=$this->call(ApiRefreshToken::class, [$request]);
        $user->message="New_Session_Token";
        return $this->transform($user, ApiLoginTransformer::class);
    }

}

