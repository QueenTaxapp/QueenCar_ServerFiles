<?php

    $router->post('/user/request/cancel', [
    'as' => 'Request@user_cancel_request',
    'uses' => 'Controller@run',
    'middleware' => [
    'userTokenCheck.api',
    ]
    ]);