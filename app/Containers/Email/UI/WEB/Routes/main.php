<?php

/**    * /admin/save - to save admin details in Table  **/

$router->any('admin/email/view', [
    'as'   => 'email',
    'uses'       => 'Controller@viewEmail',
    'module'=>"email_module",
    'path'=>"email",
    'icon'=>"email",
    'order'=>"8.1",
    'name'=>'email_module',
    'head_name'=>'message_notification',
    'head_icon'=>'contact_phone',
    'privilege'=>TRUE,
    'middleware' => [
             'auth.web',
             'accessCheck.web',
          ]
]);

$router->any('admin/email/edit/{id}/{lang}/{table}', [
    'as'   => 'editemail',
    'uses'       => 'Controller@editEmail',
    'module'=>"email_module",
    'privilege'=>TRUE,
    'middleware' => [
                     'auth.web',
          'accessCheck.web',
          ]
]);


$router->any('admin/email/update/{id}', [
    'as'   => 'updateemail',
    'uses'       => 'Controller@updateEmail',
    'module'=>"email_module",
    'privilege'=>TRUE,
    'middleware' => [
                     'auth.web',
          'accessCheck.web',
          ]
]);


$router->any('admin/email/revert/{id}/{lang}/{table}', [
    'as'   => 'revertemail',
    'uses'       => 'Controller@revertEmail',
    'module'=>"email_module",
    'privilege'=>TRUE,
    'middleware' => [
          'auth.web',
          'accessCheck.web',
          ]
]);


$router->get('/admin/email/status/{id}/{lang}/{table}', [
    'as'  => 'tooglestatus',
    'uses' => 'Controller@toogleStatus',
    'module'=>"email_module",
    'privilege'=>TRUE,
    'middleware' => [
          'auth.web',
          'accessCheck.web',
    ]
]);

$router->get('/admin/email/trail/{id}/{lang}/{table}', [
    'as'  => 'emailTrail',
    'uses' => 'Controller@emailTrail',
    'module'=>"email_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);
