<?php

/**    * /admin/save - to save admin details in Table  **/


$router->get('admin/request/{id}',[
    'as'=>'adminRequest',
    'uses'=>'Controller@adminRequest',
    'module'=>"request_module",
    'privilege'=>false,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('admin/requests/all',[
    'as'=>'adminAllRequest',
    'uses'=>'Controller@adminAllRequest',
    'module'=>"request_module",
    'path'=>"adminAllRequest",
    'icon'=>"star_border",
    'order'=>"5",
    'privilege'=>TRUE,
    "head_name"=> "request_module",
    "head_icon"=>"star_border",
    'name'=>'request_details',
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


/*$router->get('admin/request/{id}',[
    'as'=>'adminRequest',
    'uses'=>'Controller@adminRequest',
]);*/

$router->get('admin/schedule',[
    'as'=>'adminSchedule',
    'uses'=>'Controller@adminSchedule',
    'module'=>"schedule_module",
    'path'=>"adminSchedule",
    'icon'=>"schedule",
    'order'=>"5.1",
    'privilege'=>TRUE,
    "head_name"=> "request_module",
    "head_icon"=>"star_border",
    'name'=>'schedule_module',
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('admin/schedule/cancel/{id}',[
    'as'=>'adminScheduleCancel',
    'uses'=>'Controller@adminScheduleCancel',
    'module'=>"schedule_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);