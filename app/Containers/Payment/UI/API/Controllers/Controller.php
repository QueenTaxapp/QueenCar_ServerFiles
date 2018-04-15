<?php

namespace App\Containers\Payment\UI\API\Controllers;


use App\Containers\Core\CoreController\CoreClass;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\Request;


/**
 * Class Controller
 * @package App\Containers\User\UI\API\Controllers
 */
class Controller extends ApiController
{

    /**
     * @return mixed
     */
    public function run(Request $request)
    {

        return  (new CoreClass())->get_core_file($request);
    }

}

