<?php

namespace App\Containers\Compliant\ApiTask;

use App\Containers\Common\Configs_Class;
use App\Containers\Compliant\Models\CompliantModel;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Jobs\SendEmailJob;
use App\Jobs\SendReminderEmail;
use App\Ship\Exceptions\CommonException;

use App\Containers\Compliant\Models\DriverCompliantModel;

class CompliantsTask
{

    public function run($data, $custom_parameter)
    {


        $request = $data['request'];

        $id = $data['request']->id;

        $title = $data['request']->title;

        $description = $data['request']->description;

        $drivertTable = DriverModel::select('admin_reference')->where('id',$id)->first();

        $admin_refer = $drivertTable->admin_reference;;


        $flight = new DriverCompliantModel;

        $flight->admin_reference = $admin_refer;
        $flight->title = $title;
        $flight->description = $description;
        $flight->status = 1;
        $flight->driverrid = $id;
        $flight->save();

        $compliant = Configs_Class::helper()->Constant_email_data();
        $title = CompliantModel::select('title')->where('id',$title)->first();

        $compliant['title'] = $title->title;
        $compliant['description']  = $description;


        $lang = $data['request']->header('Content-Language');

        $email = Configs_Class::helper()->email(10,$lang);

        $emailAddress = DriverModel::select('email')->where('id',$id)->first();
        $emailAddress = $emailAddress->email;
        $subject = trans('localization::lang_view.compliant_registered_successfully');
        $compliant = (object)$compliant;


       // dispatch(new SendReminderEmail($email->message,$compliant,$emailAddress,$subject,$email->status));
        dispatch(new SendEmailJob($email->message,$compliant,$emailAddress,$subject,$email->status));


        $message = 'compliant registered successfully';
        $obj = new \stdClass();
        $obj->message = $message;
        $data['response']=$obj;
        return $data;

    }
}