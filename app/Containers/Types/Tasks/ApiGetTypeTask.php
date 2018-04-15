<?php

namespace App\Containers\Types\Tasks;

use App\Containers\Admin\Models\AdminModel;
use App\Containers\Types\Models\Types;
use App\Ship\Parents\Tasks\Task;
use App\Ship\Exceptions\CommonException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;


/**
 * Class ApiGetTypeTask
 * @package App\Containers\Types\Tasks
 */
class ApiGetTypeTask extends Task
{

    /**
     * Get Type
     *
     * @return  array
     */
    public function run($request)
    {
        $adminTable = AdminModel::where('id',$request->admin_id)->first();

        $types = Types::where('is_active',1)->where('admin_reference',$adminTable->admin_key)->get();



        $makeArray=[];
        foreach ($types as $type)
        {
            array_push($makeArray,(new ApiSetTypeCache())->run($type));
        }

        return $makeArray;
    }
}
