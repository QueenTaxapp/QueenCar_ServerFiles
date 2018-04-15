<?php

/*  user route */

/**    * /User/createuser - to view create user Page  **/
    $router->get('admin/user/view', [
        'as'   => 'adminUserView',
        'uses' => 'Controller@viewUser',
        'module'=>"user_module",
        'path'=>"adminUserView",
        'icon'=>"person",
        'order'=>"4",
        'name'=>'user_details',
        'head_icon'=>'person',
        'head_name'=>'user_module',
        'privilege'=>TRUE,
        'middleware' => [
            'auth.web',
            'accessCheck.web',
        ]
    ]);

/**    * /User/createuser - to view create user Page  **/
    $router->get('admin/user/add', [
        'as'   => 'adminUserAdd',
        'uses' => 'Controller@createUser',
        'module'=>"user_module",
        'privilege'=>TRUE,
        'middleware' => [
            'auth.web',
            'accessCheck.web',
        ]
    ]);

/**    * /saveuser- to save user  **/
    $router->post('admin/user/save', [
        'as'   => 'adminUserSave',
        'uses' => 'Controller@saveUser',
        'module'=>"user_module",
        'privilege'=>FALSE,
        'middleware' => [
            'auth.web',
            'accessCheck.web',
        ]
    ]);

$router->get('admin/user/edit/{id}', [
        'as'   => 'adminUserEdit',
        'uses' => 'Controller@editUser',
        'module'=>"user_module",
        'privilege'=>TRUE,
        'middleware' => [
            'auth.web',
            'accessCheck.web',
                        ]
    ]);

$router->post('admin/user/update/{id}', [
        'as'   => 'adminUserUpdate',
        'uses' => 'Controller@updateUser',
        'module'=>"user_module",
        'privilege'=>FALSE,
        'middleware' => [
            'auth.web',
            'accessCheck.web',
                        ]
    ]);

$router->any('admin/user/delete/{id}', [
        'as'   => 'adminUserDelete',
        'uses' => 'Controller@deleteUser',
        'module'=>"user_module",
        'privilege'=>TRUE,
        'middleware' => [
            'auth.web',
            'accessCheck.web',
                        ]
    ]);

$router->any('admin/user/active/{id}', [
        'as'   => 'adminUserActive',
        'uses' => 'Controller@activeUser',
        'module'=>"user_module",
        'privilege'=>TRUE,
        'middleware' => [
            'auth.web',
            'accessCheck.web',
                        ]
    ]);

$router->any('admin/user/wallet/{id}', [
        'as'   => 'adminUserWallet',
        'uses' => 'Controller@walletUser',
        'module'=>"user_module",
        'privilege'=>TRUE,
        'middleware' => [
            'auth.web',
            'accessCheck.web',
                        ]
    ]);

$router->any('admin/user/walletSpent/{id}', [
        'as'   => 'adminUserWalletSpent',
        'uses' => 'Controller@walletSpentUser',
        'module'=>"user_module",
        'privilege'=>TRUE,
        'middleware' => [
            'auth.web',
            'accessCheck.web',
                        ]
    ]);

