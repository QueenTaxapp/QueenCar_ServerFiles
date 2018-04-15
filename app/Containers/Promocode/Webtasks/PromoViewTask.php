<?php

namespace App\Containers\Promocode\Webtasks;

use App\Containers\Admin\Webtasks\Message;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Promocode\Models\PromocodeModel;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class PromoViewTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run()
    {

        $page = GetConfigs::getConfigs('paginate');

        $data=PromocodeModel::select('*');//->paginate($page);

        $reterive_key = ApiHelper::reterive_key();

        if($reterive_key != 0)
        {
            $data = $data->where('admin_reference',$reterive_key);
        }

        $data = $data->paginate($page);


        //echo"<pre>";print_r($data);die();

        if ( ! $data)
        {
            throw new ValidationException((new Message()),redirect()->to('admin/promo/add')
                ->withErrors([trans('localization::errors.internal_server_error')], 'default'));

            return array('success'=>"False",'message'=>"Error In SQL Statement..!");
        }

        return $data;
    }

}