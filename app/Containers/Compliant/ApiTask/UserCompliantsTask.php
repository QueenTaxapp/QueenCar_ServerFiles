<?php

namespace App\Containers\Compliant\ApiTask;

use App\Containers\Common\Configs_Class;
use App\Containers\Compliant\Models\CompliantModel;
use App\Containers\Jobs\SendEmailJob;
use App\Containers\User\Models\UserTableModel;
use App\Jobs\SendReminderEmail;
use App\Ship\Exceptions\CommonException;

use App\Containers\Compliant\Models\UserCompliantModel;

class UserCompliantsTask
{

    public function run($data, $custom_parameter)
    {


        $request = $data['request'];

        $id = $data['request']->id;

        $title = $data['request']->title;

        $description = $data['request']->description;

        $admin_key = $data['request']->admin_key;


        $flight = new UserCompliantModel;
        $flight->admin_reference = $admin_key;
        $flight->title = $title;
        $flight->description = $description;
        $flight->status = 1;
        $flight->userid = $id;
        $flight->save();


        $compliant = Configs_Class::helper()->Constant_email_data();
        $title = CompliantModel::select('title')->where('id',$title)->first();

        $lang = $data['request']->header('Content-Language');

        $email = Configs_Class::helper()->email(10,$lang);

        $compliant['title'] = $title->title;
        $compliant['description']  = $description;



        $subject = trans('localization::lang_view.compliant_registered_successfully');
        $compliant = (object)$compliant;
        $emailAddress = UserTableModel::select('email')->where('id',$id)->first();

        $emailAddress = $emailAddress->email;

        dispatch(new SendEmailJob($email->message,$compliant,$emailAddress,$subject,$email->status));
        //dispatch(new SendReminderEmail($email->message,$compliant,$emailAddress,$subject,$email->status));





        $message = 'compliant registered successfully';
        $obj = new \stdClass();
        $obj->message = $message;
        $data['response']=$obj;
        return $data;

    }
}