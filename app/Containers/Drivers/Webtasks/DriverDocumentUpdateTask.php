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
class DriverDocumentUpdateTask extends Task
{
    /**
     * @param      object $request
     * @param      object $driver
     *
     */
    public function run($request,$driver)
    {
        if($request->has('doc_name_one'))
        {
            $document= DriverDocument::where('id',$request->doc_id[0])->first();

            if($request->hasFile('document_one')){
                $name=(new ApiInsertUserImageTask())->run($request,"document_one");
                $document->document=$name;
            }

            $document->document_name=$request->doc_name_one;
            $date = date_create($request->expiry_date_one);
            $date_one=date_format($date,"Y-m-d");
            $document->document_ex_date= $date_one;

            $document->save();
        }

        if($request->has('doc_name_two'))
        {
            $document=DriverDocument::where('id',$request->doc_id[1])->first();

            if($request->hasFile('document_two')){
                $name=(new ApiInsertUserImageTask())->run($request,"document_two");
                $document->document=$name;
            }

            $document->document_name=$request->doc_name_two;
            $date = date_create($request->expiry_date_two);
            $date_two=date_format($date,"Y-m-d");
            $document->document_ex_date=$date_two;

            $document->save();
        }

        if($request->has('doc_name_three'))
        {

            $document= DriverDocument::where('id',$request->doc_id[2])->first();

            if($request->hasFile('document_three')){
                $name=(new ApiInsertUserImageTask())->run($request,"document_three");
                $document->document=$name;
            }

            $document->document_name=$request->doc_name_three;
            $date = date_create($request->expiry_date_three);
            $date_three=date_format($date,"Y-m-d");
            $document->document_ex_date=$date_three;

            $document->save();
        }

    }

}