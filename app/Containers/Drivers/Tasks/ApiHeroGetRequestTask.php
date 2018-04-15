<?php

namespace App\Containers\Drivers\Tasks;

use App\Containers\User911\Models\RequestMetaModel;
use App\Containers\User911\Models\RequestModel;
use App\Containers\User911\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Tasks\Task;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiHeroGetRequestTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $id = $request->id;

//echo $id;die();
        $data=RequestMetaModel::join('911_Request', '911_Request_Meta.request_id', '=', '911_Request.id')
            ->join('911_User', '911_Request.user_id', '=', '911_User.id')
            ->select('911_Request_Meta.*', '911_Request.*', '911_User.*')->where('hero_id',$id)->first();

        if (!$data) {

            throw(new CommonException())->setValue("612",trans('localization::errors.612'));
        }
//print_r($data);die();
        return $data;
    }

}