<?php

/**    * /admin/save - to save admin details in Table  **/


$router->get('company/login',[
    'as'=>'companyLoginPage',
    'uses'=>'Controller@companyLoginPage',
]);

$router->get('company/logout',[
    'as'=>'companyLogout',
    'uses'=>'Controller@companyLogout',
]);

$router->get('company/lockScreen',[
    'as'=>'companyLockScreen',
    'uses'=>'Controller@companyLockScreen',
]);

$router->post('company/lockScreenValidation',[
    'as'=>'companyLockScreenValidation',
    'uses'=>'Controller@companyLockScreenValidation',
]);

$router->post('company/login/validation',[
    'as'=>'companyLoginValidation',
    'uses'=>'Controller@companyLoginValidation',
]);


$router->any('company/dashboard',[
    'as'=>'companyDashboard',
    'uses'=>'Controller@companyDashboard',
    'middleware' => [
        'companyAuth.web',
    ]
]);


$router->get('company/driver/view',[
    'as'=>'companyDriverView',
    'uses'=>'Controller@companyDriverView',
    'module'=>"company_module",
    'privilege'=>TRUE,
    'middleware' => [
        'companyAuth.web',
          ]
]);

$router->get('company/driver/toogle/status/{id}/{status}',[
    'as'=>'companyDriverToogleStatus',
    'uses'=>'Controller@companyDriverToogleStatus',
    'module'=>"company_module",
    'privilege'=>TRUE,
        'middleware' => [
         'companyAuth.web',
    ]
]);

$router->get('company/driver/delete/{id}',[
    'as'=>'deleteCompanyDriver',
    'uses'=>'Controller@deleteCompanyDriver',
    'module'=>"company_module",
    'privilege'=>TRUE,
    'middleware' => [
         'companyAuth.web',
    ]
]);


$router->get('company/driver/add',[
    'as'=>'addCompanyDriver',
    'uses'=>'Controller@addCompanyDriver',
    'module'=>"company_module",
    'privilege'=>TRUE,
    'middleware' => [
         'companyAuth.web',
    ]
]);

$router->get('company/driver/edit/{id}',[
    'as'=>'editCompanyDriver',
    'uses'=>'Controller@editCompanyDriver',
    'module'=>"company_module",
    'privilege'=>TRUE,
    'middleware' => [
         'companyAuth.web',
    ]
]);

$router->any('company/profileEdit/{id}', [
    'as'   => 'editCompanyProfile',
    'uses'       => 'Controller@editCompanyProfile',
    'module'=>"company_module",
    'privilege'=>FALSE,
    'middleware' => [
        'companyAuth.web',
    ]
]);

$router->any('company/profileUpdate/{id}', [
    'as'   => 'updateCompanyProfile',
    'uses'       => 'Controller@updateCompanyProfile',
    'module'=>"company_module",
    'privilege'=>FALSE,
    'middleware' => [
        'companyAuth.web',
    ]
]);


//admin
$router->any('admin/company/view', [
    'as'   => 'companyView',
    'uses'       => 'Controller@companyView',
    'module'=>"company_module",
    'path'=>"companyView",
    'icon'=>"work",
    'order'=>"6",
    'privilege'=>TRUE,
    'name'=>'company_module',
    'head_name'=>'opinion',
    'head_icon'=>'work',
    'middleware' => [
          'auth.web',
          'accessCheck.web',
          ]
]);

$router->any('admin/company/status/toogle/{id}/{status}', [
    'as'   => 'companyStatusToogle',
    'uses'       => 'Controller@companyStatusToogle',
    'module'=>"company_module",
    'privilege'=>TRUE,
    'middleware' => [
          'auth.web',
          'accessCheck.web',
          ]
]);


$router->any('admin/company/block/toogle/{id}/{status}', [
    'as'   => 'companyBlockToogle',
    'uses'       => 'Controller@companyBlockToogle',
    'module'=>"company_module",
    'privilege'=>TRUE,
    'middleware' => [
          'auth.web',
          'accessCheck.web',
          ]
]);




$router->any('admin/company/delete/{id}', [
    'as'   => 'deleteCompany',
    'uses'       => 'Controller@deleteCompany',
    'module'=>"company_module",
    'privilege'=>TRUE,
    'middleware' => [
          'auth.web',
          'accessCheck.web',
          ]
]);

$router->any('admin/company/edit/{id}', [
    'as'   => 'editCompany',
    'uses'       => 'Controller@editCompany',
    'module'=>"company_module",
    'privilege'=>TRUE,
    'middleware' => [
          'auth.web',
          'accessCheck.web',
          ]
]);

$router->any('admin/company/update/{id}', [
    'as'   => 'companyUpdate',
    'uses'       => 'Controller@companyUpdate',
    'module'=>"company_module",
    'privilege'=>false,
    'middleware' => [
              'auth.web',
          'accessCheck.web',
          ]
]);

$router->any('admin/company/add', [
    'as'   => 'addCompanyPage',
    'uses'       => 'Controller@addCompanyPage',
    'module'=>"company_module",
    'privilege'=>TRUE,
    'middleware' => [
                   'auth.web',
          'accessCheck.web',
          ]
]);

$router->get('admin/company/addAccount/{company_id}', [
    'as'   => 'adminCompanyAddAccount',
    'uses' => 'Controller@createCompanyAccount',
    'module'=>"company_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


$router->post('admin/company/saveAccount/{company_id}', [
    'as'   => 'adminCompanySaveAccount',
    'uses' => 'Controller@saveCompanyAccount',
    'module'=>"company_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->any('admin/company/deleteAccount/{company_id}', [
    'as'   => 'adminCompanyDeleteAccount',
    'uses' => 'Controller@adminCompanyDeleteAccount',
    'module'=>"company_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->any('admin/company/Register', [
    'as'   => 'registerCompany',
    'uses'       => 'Controller@registerCompany',
    'module'=>"company_module",
    'privilege'=>false,
    'middleware' => [
                     'auth.web',
          'accessCheck.web',
          ]
]);


$router->any('company/driver/income/{id}/{days}', [
    'as'   => 'companyDriverIncome',
    'uses' => 'Controller@companyDriverIncome',
    'module'=>"driver_module",
    'privilege'=>TRUE,
    'middleware' => [
        'companyAuth.web',
    ]
]);


$router->any('company/driver/income/value', [
    'as'   => 'companyDriverIncomeValue',
    'uses' => 'Controller@companyDriverIncomeValue',
    'module'=>"driver_module",
    'privilege'=>false,
    'middleware' => [
        'companyAuth.web',
    ]
]);


$router->get('company/driver/addAccount/{driver_id}', [
    'as'   => 'companyDriverAddAccount',
    'uses' => 'Controller@companyCreateDriverAccount',
    'module'=>"driver_module",
    'privilege'=>TRUE,
    'middleware' => [
        'companyAuth.web',
    ]
]);
$router->post('company/driver/saveAccount/{driver_id}', [
    'as'   => 'companyDriverSaveAccount',
    'uses' => 'Controller@CompanySaveDriverAccount',
    'module'=>"driver_module",
    'privilege'=>TRUE,
    'middleware' => [
        'companyAuth.web',
    ]
]);


$router->any('company/driver/deleteAccount/{driver_id}', [
    'as'   => 'companyDriverDeleteAccount',
    'uses' => 'Controller@companyDriverDeleteAccount',
    'module'=>"driver_module",
    'privilege'=>TRUE,
    'middleware' => [
        'companyAuth.web',
    ]
]);

$router->get('/company/paymentView', [
    'as'   => 'companyPaymentView',
    'uses' => 'Controller@companyPaymentViewPage',
    'module'=>"payment_module",
    'path'=>"companyPaymentView",
    'icon'=>"payment",
    'order'=>"3",
    'name'=>'payment_module',
    "head_name"=> "request_module",
    "head_icon"=>"star_border",
    'privilege'=>TRUE,
    'middleware' => [
        'companyAuth.web',
    ]
]);

$router->get('/company/mapView', [
    'as'   => 'companyMapView',
    'uses' => 'Controller@companyMapViewPage',
    'module'=>"map_module",
    'order'=>"4",
    'privilege'=>TRUE,
    'middleware' => [
        'companyAuth.web',
    ]
]);

$router->get('/company/map/ajax', [
    'as'   => 'companyMapAjax',
    'uses' => 'Controller@companyMapAjax',
    'module'=>"map_module",
    'middleware' => [
        'companyAuth.web',
    ]
]);


$router->any('company/driver/income/paid/money/{id}', [
    'as'   => 'companyDriverIncomePaid',
    'uses' => 'Controller@CompanydriverIncomePaid',
    'module'=>"driver_module",
    'privilege'=>false,
    'middleware' => [
        'companyAuth.web',
    ]
]);

$router->any('company/driver/income/paid/money/cash/{id}', [
    'as'   => 'companyDriverIncomePaidCash',
    'uses' => 'Controller@companyDriverIncomePaidCash',
    'module'=>"driver_module",
    'privilege'=>false,
    'middleware' => [
        'companyAuth.web',
    ]
]);