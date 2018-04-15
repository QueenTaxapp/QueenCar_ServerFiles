<?php


$router->get('admin/user/review', [
    'as'   => 'userReview',
    'uses'       => 'Controller@userReview',
    'module'=>"review_module",
    'path'=>"userReview",
    'icon'=>"star_border",
    'order'=>"11.1",
    'name'=>'review_module',
    'head_name'=>'opinion',
    'head_icon'=>'report',
    'privilege'=>TRUE,
    'middleware' => [
          'auth.web',
          'accessCheck.web',
          ]
]);




$router->get('admin/user/review/edit/{id}', [
    'as'   => 'editUserReview',
    'uses'       => 'Controller@editUserReview',
    'module'=>"review_module", 
    'privilege'=>TRUE,   
    'middleware' => [
          'auth.web',
          'accessCheck.web',
          ]
]);


$router->post('admin/user/review/edit/save', [
    'as'   => 'saveEditUserReview',
    'uses'       => 'Controller@saveEditUserReview',
    'module'=>"review_module",
    'middleware' => [
          'auth.web',
          'accessCheck.web',
          ]
]);


$router->get('admin/driver/review', [
    'as'   => 'driverReview',
    'uses'       => 'Controller@driverReview',
    'module'=>"review_module", 
    'privilege'=>TRUE, 
    'middleware' => [
            'auth.web',
          'accessCheck.web',
          ]
]);

$router->get('admin/driver/review/edit/{id}', [
    'as'   => 'editdriverReview',
    'uses'       => 'Controller@editdriverReview',
    'module'=>"review_module", 
    'privilege'=>TRUE, 
    'middleware' => [
                      'auth.web',
          'accessCheck.web',
          ]
]);

$router->post('admin/driver/review/edit/save', [
    'as'   => 'saveEditDriverReview',
    'module'=>"review_module",
    'uses'       => 'Controller@saveEditDriverReview',
    'middleware' => [
                     'auth.web',
          'accessCheck.web',
          ]
]);
