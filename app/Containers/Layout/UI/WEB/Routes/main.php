<?php

/*  admin route */

/**    * /admin/login - to view Admin page  **/

$router->get('/layout', [
        'as'   => 'adminlogin',
        'uses' => 'Controller@layoutPage',
         'middleware' => [
              // 'auth.web',
          ]
    ]);


$router->any('admin/lockscreenValidation', [
        'as'   => 'lockscreenValidationa',
        'uses' => 'Controller@lockscreenValidationa',
         'middleware' => [
              // 'auth.web',
          ]
    ]);
$router->any('/admin/logouta', [
    'as'   => 'logouta',
    'uses'       => 'Controller@logouta',
    'middleware' => [
          //'auth.web',
    ]
]);


$router->any('/lock', [
        'as'   => 'adminLock',
        'uses' => 'Controller@lockScreenPage',
         'middleware' => [
               //'auth.web',
          ]
    ]);

