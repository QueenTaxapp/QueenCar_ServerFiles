<?php

/*  driver route */


$router->get('/admin/sos/view', [
    'as'   => 'adminSosView',
    'uses' => 'Controller@adminSosView',
    'module'=>"sos_module",
    'path'=>"adminSosView",
    'icon'=>" directions_run ",
    'order'=>"4.1",
    'name'=>'sos_module',
    'head_icon'=>'person',
    'head_name'=>'user_module',
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('admin/sos/add', [
    'as'   => 'adminSosAdd',
    'uses' => 'Controller@adminSosAdd',
    'module'=>"sos_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->post('admin/sos/register', [
    'as'   => 'registerAdminSos',
    'uses' => 'Controller@registerAdminSos',
    'module'=>"sos_module",
    'privilege'=>false,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


$router->get('admin/sos/edit/{id}', [
    'as'   => 'adminEditSos',
    'uses' => 'Controller@adminEditSos',
    'module'=>"sos_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


$router->post('admin/sos/modify', [
    'as'   => 'modifyAdminSos',
    'uses' => 'Controller@modifyAdminSos',
    'module'=>"sos_module",
    'privilege'=>false,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


$router->get('admin/sos/delete/{id}', [
    'as'   => 'sosDelete',
    'uses' => 'Controller@sosDelete',
    'module'=>"sos_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('admin/sos/decline/{id}', [
    'as'   => 'sosDecline',
    'uses' => 'Controller@sosDecline',
    'module'=>"sos_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


$router->get('admin/sos/approved/{id}', [
    'as'   => 'sosAccept',
    'uses' => 'Controller@sosAccept',
    'module'=>"sos_module",
    'privilege'=>true,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);
