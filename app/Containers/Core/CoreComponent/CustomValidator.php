<?php


namespace App\Containers\Core\CoreComponent;

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
class CustomValidator
{


    public function run($request,$rules)
    {

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            throw (new CommonException())->setValue('500',$validator->errors()->all()[0]);
        }
        else
        {
            return array('request' => $request);
        }
    }

}