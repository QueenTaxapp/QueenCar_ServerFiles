<?php

namespace App\Containers\Core\UI\API\Controllers;
use App\Containers\Core\CoreController\CoreMakeClass;
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
    public function installmodule(Request $request)
    {

           $core=new CoreMakeClass();
            $core->zip_extractor($request);

    }

    public function installwebmodule(Request $request)
    {
        $core=new CoreMakeClass();
        $core->zip_extractor($request);
    }

    public function makecorefile()
    {
        $core=new CoreMakeClass();
        $core->Make_file();

    }


    public function uninstallmodule(Request $request)
    {
        $core=new CoreMakeClass();
        $core->unistaller($request);

    }

    public function makemodule(Request $request)
    {
        $core=new CoreMakeClass();
        $core->make_module($request);

    }

    public function activemodule(Request $request)
    {
        $core=new CoreMakeClass();
        $core->active_module($request);

    }




}

