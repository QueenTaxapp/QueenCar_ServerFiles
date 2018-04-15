<?php

namespace App\Containers\Compliant\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;



/**
 * Class ToogleStatusTransformer
 * @package App\Containers\Drivers\UI\API\Transformers
 */
class  CompanyListTransformer extends Transformer
{

    /**
     * @param $request
     * @return array
     */
    public function transform($request)
    {

        if($request->fieldname == 'complaint_list')
        {
            $fieldName = 'complaint_list';
        }
        else
        {
            $fieldName = 'company_list';
        }

        if($request->admin_key){
            $admin_key = $request->admin_key;
        }else{
            $admin_key = null;
        }

        $response = [
            'success' => true,
            'success_message'=>$request->message,
            "$fieldName"=>$request->data,
            "admin_key"=> $admin_key,
        ];

        return $response;
    }


}
