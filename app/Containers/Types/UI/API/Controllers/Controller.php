<?php

namespace App\Containers\Types\UI\API\Controllers;
use App\Containers\Types\Actions\ApiGetTypes;
use App\Containers\Types\UI\API\Transformers\TypesTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\Request;


/**
 * Class Controller
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Controller extends ApiController
{

    /**
     * @return  json
     */
    public function getTypes(Request $request)
    {
           $types= $this->call(ApiGetTypes::class,[$request]);
            $message="Get Types";
        $object = new \stdClass();
        $object->types=$types;
        $object->message=$message;
        return $this->transform($object, TypesTransformer::class);

    }




}

