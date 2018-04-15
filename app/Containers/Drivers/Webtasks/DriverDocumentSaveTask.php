<?php

namespace App\Containers\Drivers\Webtasks;


use App\Containers\Drivers\Models\DriverDocument;
use App\Containers\User\Tasks\ApiInsertUserImageTask;
use App\Ship\Parents\Tasks\Task;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class DriverDocumentSaveTask extends Task
{
    /**
     * @param      object $request
     * @param      object $driver
     *
     */
    public function run($request,$driver)
    {
        if($request->hasFile('document_one'))
        {
            $name=(new ApiInsertUserImageTask())->run($request,"document_one");
            $document= new DriverDocument();
            $document->document_name=$request->doc_name_one;
            $document->driver_id=$driver->id;
            $document->document=$name;

            $date = date_create($request->expiry_date_one);
            $date_one=date_format($date,"Y-m-d");
            $document->document_ex_date= $date_one;

            $document->save();
        }else{
            $document= new DriverDocument();
            $document->document_name = "";
            $document->driver_id = $driver->id;
            $document->document = "";
           // $document->document_ex_date = "0000-00-00";

            $document->save();
        }

        if($request->hasFile('document_two'))
        {
            $name=(new ApiInsertUserImageTask())->run($request,"document_two");
            $document= new DriverDocument();
            $document->document_name=$request->doc_name_two;
            $document->driver_id=$driver->id;
            $document->document=$name;

            $date = date_create($request->expiry_date_two);
            $date_two=date_format($date,"Y-m-d");
            $document->document_ex_date=$date_two;

            $document->save();
        }else{
            $document= new DriverDocument();
            $document->document_name = "";
            $document->driver_id = $driver->id;
            $document->document = "";
           // $document->document_ex_date = "0000-00-00";

            $document->save();
        }

        if($request->hasFile('document_three'))
        {
            $name=(new ApiInsertUserImageTask())->run($request,"document_three");
            $document= new DriverDocument();
            $document->document_name=$request->doc_name_three;
            $document->driver_id=$driver->id;
            $document->document=$name;

            $date = date_create($request->expiry_date_three);
            $date_three=date_format($date,"Y-m-d");
            $document->document_ex_date=$date_three;

            $document->save();
        }else{
            $document= new DriverDocument();
            $document->document_name = "";
            $document->driver_id = $driver->id;
            $document->document = "";
           // $document->document_ex_date = "0000-00-00";

            $document->save();
        }

    }

}