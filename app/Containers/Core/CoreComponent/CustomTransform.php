<?php


namespace App\Containers\Core\CoreComponent;

use Apiato\Core\Traits\ResponseTrait;
use App\Ship\Exceptions\CommonException;
use Validator;
use App\Containers\Core\CoreController\CoreClass;
use App\Containers\Test_module\UI\API\Requests\ApiLoginRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\Request;


/**
 * Class Controller
 * @package App\Containers\User\UI\API\Controllers
 */
class CustomTransform
{

use ResponseTrait;
    public function run($data,$class)
    {

        return $this->transform($data, $class);
    }

}