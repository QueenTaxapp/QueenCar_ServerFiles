<?php

namespace App\Containers\Drivers\Tasks;


use App\Containers\Drivers\Models\DriverDocument;
use App\Containers\User\Tasks\ApiInsertUserImageTask;
use App\Ship\Parents\Tasks\Task;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiDriverDocumentTask extends Task
{
    /**
     * @param      object $request
     * @param      object $driver
     *
     */
    public function run($request,$driver)
    {
        if($request->insurance)
        {
            $name=(new ApiInsertUserImageTask())->run($request,"insurance");
            $document= new DriverDocument();
            $document->document_name=$request->insurance_name;
            $document->driver_id=$driver->id;
            $document->document=$name;
            $document->document_ex_date=$request->insurance_date;
            $document->save();
        }

        if($request->license)
        {
            $name=(new ApiInsertUserImageTask())->run($request,"license");
            $document= new DriverDocument();
            $document->document_name=$request->license_name;
            $document->driver_id=$driver->id;
            $document->document=$name;
            $document->document_ex_date=$request->license_date;
            $document->save();
        }

        if($request->rcbook)
        {
            $name=(new ApiInsertUserImageTask())->run($request,"rcbook");
            $document= new DriverDocument();
            $document->document_name=$request->rcbook_name;
            $document->driver_id=$driver->id;
            $document->document=$name;
            $document->document_ex_date=$request->rcbook_date;
            $document->save();
        }

    }

}