<?php

$router->get('/admin/driverTypeView', [
    'as'   => 'adminDriverTypeView',
    'uses' => 'Controller@adminDriverTypeViewPage',
    'module'=>"type_module",
    'path'=>"adminDriverTypeView",
    'icon'=>"time_to_leave",
    'order'=>"3.1",
    'name'=>'type_module',
    'head_icon'=>'local_taxi',
    'head_name'=>'driver_module',
    'privilege'=>TRUE,
    'middleware' => [
         'auth.web',
         'accessCheck.web',
    ]
]);

$router->get('/admin/driverTypeAdd', [
    'as'   => 'adminDriverTypeAdd',
    'uses' => 'Controller@adminDriverTypeAdd',
    'module'=>"type_module",
    'privilege'=>TRUE,
    'middleware' => [
         'auth.web',
         'accessCheck.web',
    ]
]);

$router->post('/admin/driverTypeSave', [
    'as'   => 'adminDriverTypeSave',
    'uses' => 'Controller@adminDriverTypeSave',
    'module'=>"type_module",
    'privilege'=>FALSE,
    'middleware' => [
         'auth.web',
         'accessCheck.web',
    ]
]);

$router->get('/admin/driverTypeEdit/{id}', [
    'as'   => 'adminDriverTypeEdit',
    'uses' => 'Controller@adminDriverTypeEdit',
    'module'=>"type_module",
    'privilege'=>TRUE,
    'middleware' => [
         'auth.web',
         'accessCheck.web',
    ]
]);

$router->post('/admin/driverTypeUpdate/{id}', [
    'as'   => 'adminDriverTypeUpdate',
    'uses' => 'Controller@adminDriverTypeUpdate',
    'module'=>"type_module",
    'privilege'=>FALSE,
    'middleware' => [
         'auth.web',
         'accessCheck.web',
    ]
]);

$router->get('/admin/driverTypeDelete/{id}', [
    'as'   => 'adminDriverTypeDelete',
    'uses' => 'Controller@adminDriverTypeDelete',
    'module'=>"type_module",
    'privilege'=>TRUE,
    'middleware' => [
         'auth.web',
         'accessCheck.web',
    ]
]);

$router->get('/admin/driverTypeStatusToggle/{id}', [
    'as'   => 'adminDriverTypeStatusToggle',
    'uses' => 'Controller@adminDriverTypeStatusToggle',
    'module'=>"type_module",
    'privilege'=>TRUE,
    'middleware' => [
         'auth.web',
         'accessCheck.web',
    ]
]);
