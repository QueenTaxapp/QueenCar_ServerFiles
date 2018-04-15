<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\Common\ApiHelper;
use App\Containers\Jobs\SendSmsJob;
use App\Containers\Request\Models\RequestMetaModel;
use App\Containers\User\Models\UserDetail;
use App\Containers\User\Models\UserTableModel;
use App\Containers\User\Tasks\ApiCheckEmailTask;
use App\Ship\Exceptions\CommonException;

use App\Containers\Compliant\Models\UserCompliantModel;

use App\Containers\Promocode\Models\PromocodeModel;
use Carbon\Carbon;
use App\Containers\Promocode\Models\PromoCodeHistoryModel;
use App\Containers\Request\Models\RequestModel;

use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Tasks\DynamicApiEmailCheckTask;
use App\Containers\User\Tasks\ApiCheckPasswordTask;
use App\Containers\Drivers\Models\DriverModel;
use Illuminate\Support\Facades\DB;
use App\Containers\User\ApiTask\CreateRequest;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;


class DispatchLogoutTask
{

    public function run($data)
    {


        $id = $data['request']->id;


        $random_number = rand(10,100).rand(10,100).rand(10,100);


            AdminModel::where('id', '=', $id)
                ->update(array('remember_token'=>$random_number));




        $response = new \stdClass();

        $response->success = 'true';

        $response->message = "successfully_loggedout";

        $data['response']= $response;


        return $data;



    }
}