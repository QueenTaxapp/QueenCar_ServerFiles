<?php

namespace App\Containers\Drivers\Webtasks;

use App\Containers\Admin\Webtasks\Message;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Drivers\Models\DriverModel;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class DriverViewTask extends Task
{
    /**
     * Save User Detail
     * @param Object $request
     * @param String $token
     *
     * @return  Object
     */
    public function run()
    {
        $page = GetConfigs::getConfigs('paginate');

        $select = array('id','registration_code','firstname','lastname','email','phone_number','is_approve','admin_reference');
        $data=DriverModel::select($select);


        $reterive_key =  ApiHelper::reterive_key();


        if($reterive_key != 0 )
        {
            $data = $data->where('admin_reference',$reterive_key);
        }


        $data = $data->orderBy('id','desc')->paginate($page);


        if ( ! $data)
        {
            throw new ValidationException((new Message()),redirect()->to('admin/user/add')
                ->withErrors([trans('localization::errors.internal_server_error')], 'default'));

        }

        return $data;



    }

}
