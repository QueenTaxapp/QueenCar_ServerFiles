<?php

namespace App\Containers\Company\UI\API\Controllers;


use App\Containers\Core\CoreController\CoreClass;
use App\Containers\Drivers\Actions\ApiHeroLoginAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\Request;


class Controller extends ApiController
{


    public function run(Request $request)
    {


        return  (new CoreClass())->get_core_file($request);
    }

}
