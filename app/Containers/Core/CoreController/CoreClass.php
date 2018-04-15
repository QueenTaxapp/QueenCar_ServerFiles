<?php


namespace App\Containers\Core\CoreController;
use Apiato\Core\Traits\CallableTrait;
use App\Containers\Core\CoreComponent\CustomTransform;
use App\Containers\Core\CoreComponent\CustomValidator;
use App\Containers\Test_module\UI\API\Controllers\TestController;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Controllers\ApiController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;


/**
 * Build Module Based Functionality and core file for this architecture
 * Class CoreClass
 * @package App\Containers\Core\CoreController
 */
class CoreClass
{
    use CallableTrait;
    /**
     * CoreClass constructor.
     */
    public function __construct()
    {

    }

    private $data=[];

    private $request;

    public function get_core_file($request)
    {
        $this->request =$request;
        $path = app_path('Containers/Core/CoreJson/Core.json');
        if(file_exists($path))
        {
            $object=json_decode(file_get_contents($path));



            $job=$this->getmodule($object);
            return $this->extractjob($job);
        }
        else
        {
            throw (new CommonException())->setValue('707',trans('localization::errors.707'));
        }
    }

    public function checkKey($item,$property)
    {
        if(property_exists($item,$property))
        {
            return $item->{$property};
        }
        return null;
    }

    public function executejob($item)
    {

        return $this->call($item->namespace,[$this->data,$this->checkKey($item,'custom_parameter')]);
        //return  (new $item->namespace())->run($this->data,$item->custom_parameter);
    }

    public function validator($item)
    {

//print_r($item->namespace);die();
        $rules= (new $item->namespace())->rules($this->request);
        return $this->call(CustomValidator::class,[$this->request,$rules]);
    }

    public function mergedata($temp)
    {
        if($temp == null)
        {
            throw (new CommonException())->setValue('709',trans('localization::errors.709'));
        }
        else
        {
            $this->data=$temp;
        }
    }

    public function getResponse($item)
    {

        if(array_key_exists("change_transform",$this->data))
        {
            return $this->call(CustomTransform::class,[$this->data['response'],$item->{$this->data['change_transform']}]);
        }
        else
        {
            return $this->call(CustomTransform::class,[$this->data['response'],$item->namespace]);
        }

    }

    public function extractjob($job)
    {

        foreach ($job as $item) {

            if($item->id == 'validator')
            {
                $temp_data=$this->validator($item);
            }
            else if($item->id == 'end')
            {

                if(is_array($this->data) && array_key_exists('response',$this->data))
                {

                    return $this->getResponse($item);
                }
                else{
                    throw (new CommonException())->setValue('710',trans('localization::errors.710'));
                }
            }
            else
            {
                $temp_data=$this->executejob($item);
            }
            $this->mergedata($temp_data);

        }

    }

    /**
     * @return mixed
     */
    public function getRouteName()
    {
        $route_name=Route::currentRouteName();
        return explode('@',$route_name);
    }


    /**
     * check the module in object
     * @param $object
     * @return mixed
     */
    public function getmodule($object)
    {

        if($object->module)
        {
            $routename=$this->getRouteName();

            $flow = null;

            if($this->checkKey($object->module,$routename[0]) && $this->checkKey($object->module->{$routename[0]},$routename[1]))
            {
                $flow=$object->module->{$routename[0]}->{$routename[1]}->flow;

            }

            if($this->checkKey($object->Custom_module,$routename[0]) && $this->checkKey($object->Custom_module->{$routename[0]},$routename[1]) && $object->Custom_module->{$routename[0]}->{$routename[1]}->is_active)
            {
                $flow=$object->Custom_module->{$routename[0]}->{$routename[1]}->flow;
            }



            if($flow)
            {
                return $flow;
            }

        }

        throw (new CommonException())->setValue('706',trans('localization::errors.706'));
    }

}
