<?php



$router->any('/admin/test', [
    'as'   => 'admintest',
    'uses'       => 'Controller@admintest',
    'middleware' => [
        //'auth.web',
    ]
]);


$router->any('/admin/login', [
    'as'   => 'adminLoginPage',
    'uses'       => 'Controller@adminLoginPage',
    'middleware' => [
        //  'auth.web',
    ]
]);

$router->any('/admin/lockscreen/{id}', [
    'as'   => 'adminLockscreenPage',
    'uses'       => 'Controller@adminLockscreenPage',
    'middleware' => [
          //'auth.web',
    ]
]);


$router->any('/admin/adminloginValidation', [
    'as'   => 'adminLoginValidation',
    'uses'       => 'Controller@adminLoginValidation',
    'middleware' => [
        //  'auth.web',
    ]
]);


$router->get('/admin/view', [
    'as'   => 'adminView',
    'uses' => 'Controller@adminViewPage',
    'name'=>'admin_details',
    'head_name'=>'admin_module',
    'icon'=>"account_circle",
    'head_icon'=>'account_circle',
    'path'=>"adminView",
    'module'=>"admin_module",
    'order'=>"2",
    'privilege'=>TRUE,
    'middleware' => [
         'auth.web',
          'accessCheck.web',
    ]
]);

$router->get('/admin/add', [
    'as'   => 'adminAdd',
    'uses' => 'Controller@adminAddPage',
    'module'=>"admin_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
         'accessCheck.web',
    ]
]);

$router->post('/admin/addSave', [
    'as'   => 'adminAddSave',
    'uses' => 'Controller@adminAddSave',
    'module'=>"admin_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
         'accessCheck.web',
    ]
]);

$router->get('/admin/edit/{id}', [
    'as'   => 'adminEdit',
    'uses' => 'Controller@adminEdit',
    'module'=>"admin_module",
    'privilege'=>TRUE,
    'middleware' => [
         'auth.web',
          'accessCheck.web',

    ]
]);


$router->get('/admin/profile/edit/{id}', [
    'as'   => 'adminEditProfile',
    'uses' => 'Controller@adminEditProfile',
    'module'=>"profile_module",
    'privilege'=>false,
    'middleware' => [
         'auth.web',
          'accessCheck.web',
    ]
]);

$router->post('/admin/profile/update/{id}', [
    'as'   => 'adminProfileUpdate',
    'uses' => 'Controller@adminProfileUpdate',
    'module'=>"profile_module",
    'privilege'=>false,
    'middleware' => [
         'auth.web',
         'accessCheck.web',
    ]
]);

$router->post('/admin/update/{id}', [
    'as'   => 'adminUpdate',
    'uses' => 'Controller@adminUpdate',
    'module'=>"admin_module",
    'privilege'=>FALSE,
    'middleware' => [
         'auth.web',
         'accessCheck.web',
    ]
]);

$router->any('/admin/passwordChange/{id}', [
    'as'   => 'adminPasswordChange',
    'uses' => 'Controller@adminPasswordChange',
    'module'=>"admin_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->any('/admin/passwordUpdate/{id}', [
    'as'   => 'adminPasswordUpdate',
    'uses' => 'Controller@adminPasswordUpdate',
    'module'=>"admin_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('/admin/delete/{id}', [
    'as'   => 'adminDelete',
    'uses' => 'Controller@adminDelete',
    'module'=>"admin_module",
    'privilege'=>TRUE,
    'middleware' => [
         'auth.web',
          'accessCheck.web',
        'Role.web',
    ]
]);

$router->get('/admin/active/{id}', [
    'as'   => 'adminActive',
    'uses' => 'Controller@adminActive',
    'module'=>"admin_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
         'accessCheck.web',
        'Role.web',
    ]
]);

$router->get('/admin/inactive/{id}', [
    'as'   => 'adminInactive',
    'uses' => 'Controller@adminInactive',
    'module'=>"admin_module",
    'privilege'=>TRUE,
    'middleware' => [
         'auth.web',
          'accessCheck.web',
        'Role.web',
    ]
]);

$router->get('/admin/userPrivilegesEdit/{id}', [
    'as'   => 'adminUserPrivilegesEdit',
    'uses'       => 'Controller@adminUserPrivilegesEdit',
    'module'=>"admin_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
         'accessCheck.web',
        'Role.web',
    ]
]);

$router->post('/admin/userPrivilegesUpdate/{id}', [
    'as'   => 'adminUserPrivilegesUpdate',
    'uses'       => 'Controller@adminUserPrivilegesUpdate',
    'module'=>"admin_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
         'accessCheck.web',
    ]
]);



$router->get('/admin/typesView', [
    'as'   => 'adminTypesView',
    'uses'       => 'Controller@adminTypesView',
    'name'=>'role_module',
    'head_name'=>'admin_module',
    'icon'=>"pan_tool",
    'head_icon'=>'account_circle',
    'path'=>"adminTypesView",
    'module'=>"role_module",
    'order'=>"2.1",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
         'accessCheck.web',
    ]
]);

$router->get('/admin/typesAdd', [
    'as'   => 'adminTypesAdd',
    'uses'       => 'Controller@adminTypesAdd',
    'module'=>"role_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
         'accessCheck.web',
    ]
]);

$router->post('/admin/typesSave', [
    'as'   => 'adminTypesSave',
    'uses'       => 'Controller@adminTypesSave',
    'module'=>"role_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
         'accessCheck.web',
    ]
]);

$router->get('/admin/typeNameEdit/{id}', [
    'as'   => 'adminTypeNameEdit',
    'uses'       => 'Controller@adminTypesNameEdit',
    'module'=>"role_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
         'accessCheck.web',
    ]
]);


$router->post('/admin/typeNameSave/{id}', [
    'as'   => 'adminTypeNameSave',
    'uses'       => 'Controller@adminTypesNameSave',
    'module'=>"role_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
         'accessCheck.web',
    ]
]);


$router->get('/admin/typePrivilegeEdit/{id}', [
    'as'   => 'adminTypePrivilegeEdit',
    'uses'       => 'Controller@adminTypePrivilegesEdit',
    'module'=>"role_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
         'accessCheck.web',
    ]
]);

$router->post('/admin/typePrivilegeSave', [
    'as'   => 'adminTypePrivilegeSave',
    'uses'       => 'Controller@adminTypePrivilegesSave',
    'module'=>"role_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
         'accessCheck.web',
    ]
]);


/*$router->any('/admin/drag/{id}', [
    'as'   => 'dragdrop',
    'uses'       => 'Controller@dragdrop',
    'middleware' => [
        'auth.web',
         'accessCheck.web',
    ]
]);*/

$router->any('/admin/dashboard', [
    'as'   => 'dashboard',
    'uses' => 'Controller@dashboard',
    'module'=>"dashboard_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->any('/admin/map/view', [
    'as'   => 'mapView',
    'uses' => 'Controller@mapView',
    'name'=>'map_module',
    'head_name'=>'map_view',
    'icon'=>"place",
    'head_icon'=>'place',
    'module'=>"map_module",
    'path'=>"mapView",
    'order'=>"7",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);
$router->any('/admin/map/ajax', [
    'as'   => 'mapAjax',
    'uses' => 'Controller@mapAjax',
//    'middleware' => [
        //'auth.web',
       // 'accessCheck.web',
  //  ]
]);

$router->any('/admin/map/view2', [
    'as'   => 'mapView2',
    'uses' => 'Controller@mapView2',
//    'middleware' => [
        //'auth.web',
       // 'accessCheck.web',
  //  ]
]);
$router->any('/admin/map/ajax2', [
    'as'   => 'mapAjax2',
    'uses' => 'Controller@mapAjax2',
//    'middleware' => [
        //'auth.web',
       // 'accessCheck.web',
  //  ]
]);

$router->any('/dynamic/localization', [
    'as'   => 'dynamicLocalization',
    'uses'       => 'Controller@dynamicLocalization',
]);


$router->any('/excel/array', [
    'as'   => 'excelToArray',
    'uses'       => 'Controller@excelToArray',
]);


$router->any('/admin/key/change/{key}', [
    'as'   => 'reteriveKeyChange',
    'uses'       => 'Controller@reterive_key_change',
    'middleware' => [
          'auth.web',
          'SuperAdminRole.web'
    ]
]);

