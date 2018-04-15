<?php

/**
 * @apiGroup           Types
 * @apiName            Get Driver Types
 * @api                {get} /application/types Get Driver Types
 * @apiDescription     Get Driver Types
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}    admin_id
 *
 *
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 * {
 *  "success": true,
 *  "success_message": "Get Types",
 *  "types": [
 *          {
 *          "id": "2",
 *          "name": "test",
 *          "icon": "http:\/\/192.168.1.18\/tabgo\/public\/assets\/img\/uploads\/60758.png",
 *          }
 *   ]
 * }
 *
 */

    $router->any('/application/types', [
        'as'   => 'GetTypes',
        'uses' => 'Controller@getTypes',
    ]);



