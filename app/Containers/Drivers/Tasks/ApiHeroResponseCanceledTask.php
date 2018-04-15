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
class ApiHeroResponseCanceledTask extends Task
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


    $cancel = new HeroCancelModel();
        $cancel->hero_id = $id;
        $cancel->request_id = $request_id;
        $cancel->reason = $request->reason;

        $cancel->save();

        $req_data=DB::table('911_Request_Meta')->where('hero_id',$id)->where('request_id',$request_id)->delete();



        return $cancel;
    }

}