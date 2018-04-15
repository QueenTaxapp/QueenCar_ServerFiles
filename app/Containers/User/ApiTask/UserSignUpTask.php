<?php
namespace App\Containers\User\ApiTask;
use App\Containers\Common\ApiHelper;
use App\Containers\Jobs\SendEmailJob;
use App\Containers\Sos\Models\SosModel;
use App\Containers\User\Models\Country;
use App\Containers\User\Models\Refferal;
use App\Ship\Exceptions\CommonException;
use App\Containers\Common\Configs_Class;
use App\Containers\User\Tasks\GetRandomCode;
use App\Containers\Zone\Models\CurrencyModel;
use App\Containers\User\Models\UserTableModel;
use App\Containers\User\Tasks\ApiUserSignupTask;
use App\Containers\Admin\Webtasks\SessionKeyTask;
use App\Containers\User\Tasks\ApiInsertUserImageTask;

class UserSignUpTask
{
    public function run($data, $custom_parameter)
    {

        $request = $data['request'];

        $this->check_phone_number($request->phone_number);

        $picture='';

        $obj= new SessionKeyTask;

        $token = $obj->run();

        if($request->hasFile('profile_pic'))
        {

            $obj = new ApiInsertUserImageTask();

            $picture = $obj->run($request,'profile_pic');

        }


        $userObject = new ApiUserSignupTask();
        $user1 = $userObject->run($request,$token);

        $user1->profile_pic=$picture?:"";
        $user1->save();

        $codeObject = new GetRandomCode();

        $code = $codeObject->run(5);


        $refferal = new Refferal();
        $refferal->user_id=$user1->id;
        $refferal->amount_earned=0;
        $refferal->amount_spent=0;
        $refferal->amount_balance=0;
        $refferal->code= $code;
        $refferal->save();

        $user = Configs_Class::helper()->Constant_email_data();



        $user['firstName'] = $request->firstname;
        $user['lastName']  = $request->lastname;
        $user['emailAddress'] = $request->email;
        $user['phoneNumber'] = $request->phone_number;


        $lang = $data['request']->header('Content-Language');

        $email = Configs_Class::helper()->email(1,$lang);


        $subject = trans('localization::lang_view.welcome_to') .$user['appName'];
        $user = (object)$user;



        dispatch(new SendEmailJob($email->message,$user,$request->email,$subject,$email->status));


        //$sos = SosModel::select('id','name','number')->get();


        $array = array();

        $message = trans('localization::errors.registered_successfully');
        $obj = new \stdClass();
        $obj->message = $message;
        $obj->data = (object)array('driver'=>$user1,'sos'=>$array);
        $data['response']=$obj;
        return $data;


    }


    public function check_phone_number($phone_number)
    {
        $phone = UserTableModel::where('phone_number',$phone_number)->first();
        if($phone)
        {
            throw (new CommonException())->setValue('736',trans('localization::errors.736'));
        }
    }
}

