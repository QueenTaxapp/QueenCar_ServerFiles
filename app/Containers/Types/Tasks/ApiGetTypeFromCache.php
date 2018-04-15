<?php

namespace App\Containers\Types\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Cache;


class ApiGetTypeFromCache extends Task
{

    /**
     * Get From Cache
     *
     * @return  array
     */
    public function run()
    {
        return unserialize(Cache::get('types'));

    }
}
