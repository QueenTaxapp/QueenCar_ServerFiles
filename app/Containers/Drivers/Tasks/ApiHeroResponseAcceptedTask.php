<?php

namespace App\Containers\Drivers\Tasks;

use App\Containers\Drivers\Models\HeroCancelModel;
use App\Containers\User911\Models\RequestMetaModel;
use App\Containers\User911\Models\RequestModel;
use App\Containers\User911\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiHeroResponseAcceptedTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $id = $request->id;
        $request_id = $request->request_id;

            $data=RequestModel::where('id',$request_id)->first();

            if($data->conformed_hero_id == 0)
            {
                $data->conformed_hero_id =  $id;
                $data->save();


                $req_data=DB::table('911_Request_Meta')->where('request_id',$request_id)->delete();

                if (!$data->save()) {

                    throw(new CommonException())->setValue("612",trans('localization::errors.612'));
                }
            }
            else
            {
                throw(new CommonException())->setValue("616",trans('localization::errors.616'));
            }

        $res = RequestModel::join('911_User', '911_Request.user_id', '=', '911_User.id')
            ->select('911_Request.*', '911_User.*')->where('911_Request.id',$request_id)->first();


        return $res;
    }

}