<?php

namespace App\Containers\Company\ApiTask;

use App\Ship\Exceptions\CommonException;



class CompanyListTask
{


    public function run($data, $custom_parameter)
    {



        $tableNameSpace = 'App\Containers\Company\Models\CompanyModel';


        $companyList = $tableNameSpace::select('id','company_name')->get();


        $companiesArray = array();

        foreach ($companyList as $value)
        {
            $companyArray = array();
            $companyArray['id'] = $value->id;
            $companyArray['name'] = $value->company_name;

            $companiesArray[] = (object)$companyArray;
        }


            $message = 'company_list';
            $obj = new \stdClass();
            $obj->message = $message;
            $obj->data = $companiesArray;
            $data['response']=$obj;
            return $data;

    }
}