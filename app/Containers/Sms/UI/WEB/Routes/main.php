<?php

/*  Sms route */

/**    * /admin/sms/view - to view Sms View page  **/

$router->any('/admin/sms/view', [
    'as'  => 'admin/sms/view',
    'uses' => 'Controller@smsView',
    'module'=>"sms_module",
    'path'=>"admin/sms/view",
    'icon'=>"contact_phone",
    'order'=>"8",
    'name'=>'sms_module',
    'head_name'=>'message_notification',
    'head_icon'=>'contact_phone',
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

/**    * /admin/sms/edit - to view Sms Edit page  **/
$router->any('/admin/sms/edit/{id}/{lang}/{table}', [
    'as'  => 'admin/sms/edit',
    'uses' => 'Controller@smsEdit',
    'module'=>"sms_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

/**    * /admin/sms/update - to update Sms Settings  **/
$router->any('/admin/sms/update/{id}', [
    'as'  => 'admin/sms/update',
    'uses' => 'Controller@smsUpdate',
    'module'=>"sms_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

/**    * /admin/sms/revert - to restore the default Sms Settings  **/
$router->any('admin/sms/revert/{id}/{lang}/{table}', [
    'as'   => 'admin/sms/revert',
    'uses' => 'Controller@smsRevert',
    'module'=>"sms_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

/**    * /admin/sms/active - to Activate the default Sms Settings  **/
$router->any('admin/sms/active/{id}/{lang}/{table}', [
    'as'   => 'admin/sms/active',
    'uses' => 'Controller@smsActive',
    'module'=>"sms_module",
    'privilege'=>TRUE,
    'middleware' => [
         'auth.web',
        'accessCheck.web',
    ]
]);

/**    * /admin/sms/inactive - to Inactivate the default Sms Settings  **/
$router->any('admin/sms/inactive/{id}/{lang}/{table}', [
    'as'   => 'admin/sms/inactive',
    'uses' => 'Controller@smsInactive',
    'module'=>"sms_module",
    'privilege'=>TRUE,
    'middleware' => [
         'auth.web',
        'accessCheck.web',
    ]
]);