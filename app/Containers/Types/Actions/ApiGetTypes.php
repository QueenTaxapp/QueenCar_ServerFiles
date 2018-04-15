<?php

namespace App\Containers\Types\Actions;
 
use App\Containers\Types\Tasks\ApiGetTypeFromCache;
use App\Containers\Types\Tasks\ApiGetTypeTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\Cache;

/**
 * Class ApiGetTypes
 * @package App\Containers\Types\Actions
 */
class ApiGetTypes extends Action
{

    /**
     * Get Type
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  array
     */
    public function run($request)
    {
        return $this->call(ApiGetTypeTask::class,[$request]);
    }
}