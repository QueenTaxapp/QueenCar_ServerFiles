<?php

/*  driver route */


$router->any('admin/driver/view', [
    'as'   => 'adminDriverView',
    'uses' => 'Controller@viewDriver',
    'module'=>"driver_module",
    'path'=>"adminDriverView",
    'icon'=>" local_taxi",
    'order'=>"3",
    'privilege'=>TRUE,
    'name'=>'driver_details',
    'head_icon'=>'local_taxi',
    'head_name'=>'driver_module',
    'middleware' => [
        'auth.web',
        'accessCheck.web',

    ]
]);
/**    * /driver/add - to view Hero add page  **/

$router->get('admin/driver/add', [
    'as'   => 'adminDriverAdd',
    'uses' => 'Controller@createDriver',
    'module'=>"driver_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',

    ]
]);

$router->get('admin/driver/addAccount/{driver_id}', [
    'as'   => 'adminDriverAddAccount',
    'uses' => 'Controller@createDriverAccount',
    'module'=>"driver_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
        'Privilege.web',
    ]
]);


$router->post('admin/driver/saveAccount/{driver_id}', [
    'as'   => 'adminDriverSaveAccount',
    'uses' => 'Controller@saveDriverAccount',
    'module'=>"driver_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
        'Privilege.web',
    ]
]);

$router->any('admin/driver/deleteAccount/{driver_id}', [
    'as'   => 'adminDriverDeleteAccount',
    'uses' => 'Controller@adminDriverDeleteAccount',
    'module'=>"driver_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
        'Privilege.web',

    ]
]);

/**    * /saveuser- to save user  **/
$router->post('admin/driver/save', [
    'as'   => 'adminDriverSave',
    'uses' => 'Controller@saveDriver',
    'module'=>"driver_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('admin/driver/edit/{id}', [
    'as'   => 'adminDriverEdit',
    'uses' => 'Controller@editDriver',
    'module'=>"driver_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
        'Privilege.web',
    ]
]);

$router->post('admin/driver/update/{id}', [
    'as'   => 'adminDriverUpdate',
    'uses' => 'Controller@updateDriver',
    'module'=>"driver_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
        'Privilege.web'
    ]
]);



$router->any('admin/driver/delete/{id}', [
    'as'   => 'adminDriverDelete',
    'uses' => 'Controller@deleteDriver',
    'module'=>"driver_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
        'Privilege.web'
    ]
]);



$router->any('admin/driver/approve/{id}', [
    'as'   => 'adminDriverApprove',
    'uses' => 'Controller@approveDriver',
    'module'=>"driver_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
        'Privilege.web'
    ]
]);

$router->any('admin/driver/income/{id}/{days}', [
    'as'   => 'adminDriverIncome',
    'uses' => 'Controller@driverIncome',
    'module'=>"driver_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
        'Privilege.web'
    ]
]);


$router->any('admin/driver/income/value', [
    'as'   => 'adminDriverIncomeValue',
    'uses' => 'Controller@driverIncomeValue',
    'module'=>"driver_module",
    'privilege'=>false,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


$router->any('admin/driver/income/paid/money/{id}', [
    'as'   => 'adminDriverIncomePaid',
    'uses' => 'Controller@driverIncomePaid',
    'module'=>"driver_module",
    'privilege'=>false,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
        'Privilege.web'
    ]
]);


$router->any('admin/driver/income/paid/money/cash/{id}', [
    'as'   => 'adminDriverIncomePaidCash',
    'uses' => 'Controller@driverIncomePaidCash',
    'module'=>"driver_module",
    'privilege'=>false,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
        'Privilege.web'
    ]
]);


$router->any('admin/driver/documentExpiry', [
    'as'   => 'adminDriverDocumentExpiry',
    'uses' => 'Controller@DriverDocumentExpiry',
    'module'=>"driver_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',

    ]
]);

$router->POST('/admin/driver/specfic/types', [
  'as'   => 'adminSpecificTypes',
  'uses' => 'Controller@adminSpecificTypes',
   'middleware' => [
      'auth.web',
    ]
]);
$router->POST('/admin/company/specfic/types', [
  'as'   => 'companySpecificTypes',
  'uses' => 'Controller@companySpecificTypes',
   'middleware' => [
     'auth.web',
    ]
]);
