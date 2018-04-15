<?php

/*  driver route */


$router->get('/admin/user/compliant/view', [
    'as'   => 'userCompliantView',
    'uses' => 'Controller@userCompliantView',
    'module'=>"compliant_module",
    'path'=>"userCompliantView",
    'icon'=>"report",
    'order'=>"11",
    'name'=>'view_compliant',
    'head_name'=>'opinion',
    'head_icon'=>'report',
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('/admin/user/compliant/taken/{id}', [
    'as'   => 'userCompliantEditPage',
    'uses' => 'Controller@userCompliantEditPage',
    'module'=>"compliant_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('/admin/user/compliant/solved/{id}', [
    'as'   => 'taken',
    'uses' => 'Controller@taken',
    'module'=>"compliant_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('/admin/user/compliant/edit/{id}', [
    'as'   => 'solved',
    'uses' => 'Controller@solved',
    'module'=>"compliant_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->post('/admin/user/compliant/modify', [
    'as'   => 'userCompliantModify',
    'uses' => 'Controller@userCompliantModify',
    'module'=>"compliant_module",
    'privilege'=>false,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);















$router->any('/admin/compliant/view', [
    'as'   => 'compliantView',
    'uses' => 'Controller@compliantView',
    'module'=>"compliant_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);
$router->get('/admin/compliant/add', [
    'as'   => 'addCompliant',
    'uses' => 'Controller@addCompliant',
    'module'=>"compliant_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->post('/admin/compliant/register', [
    'as'   => 'registerCompliants',
    'uses' => 'Controller@registerCompliants',
    'module'=>"compliant_module",
    'privilege'=>false,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


$router->get('/admin/compliant/edit/{id}', [
    'as'   => 'editCompliant',
    'uses' => 'Controller@editCompliant',
    'module'=>"compliant_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->post('/admin/compliant/modify', [
    'as'   => 'modifyCompliants',
    'uses' => 'Controller@modifyCompliants',
    'module'=>"compliant_module",
    'privilege'=>false,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);
$router->get('/admin/compliant/delete/{id}', [
    'as'   => 'deleteCompliant',
    'uses' => 'Controller@deleteCompliant',
    'module'=>"compliant_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('/admin/compliant/accept/{id}', [
    'as'   => 'acceptCompliant',
    'uses' => 'Controller@acceptCompliant',
    'module'=>"compliant_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('/admin/compliant/decline/{id}', [
    'as'   => 'declineCompliant',
    'uses' => 'Controller@declineCompliant',
    'module'=>"compliant_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


$router->get('/admin/driver/compliant/view', [
    'as'   => 'driverCompliantView',
    'uses' => 'Controller@driverCompliantView',
    'module'=>"compliant_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('/admin/driver/compliant/taken/{id}', [
    'as'   => 'driverCompliantEditPage',
    'uses' => 'Controller@driverCompliantEditPage',
    'module'=>"compliant_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('/admin/driver/compliant/solved/{id}', [
    'as'   => 'driverTaken',
    'uses' => 'Controller@driverTaken',
    'module'=>"compliant_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('/admin/driver/compliant/edit/{id}', [
    'as'   => 'driverSolved',
    'uses' => 'Controller@driverSolved',
    'module'=>"compliant_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->post('/admin/driver/compliant/modify', [
    'as'   => 'driverCompliantModify',
    'uses' => 'Controller@driverCompliantModify',
    'module'=>"driverCompliantModify",
    'privilege'=>false,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);