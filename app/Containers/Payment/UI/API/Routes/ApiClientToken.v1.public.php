<?php

/**
 * @apiGroup           Payment
 * @apiName            Payment nonce token
 * @api                {post} /application/client_token Payment nonce token
 * @apiDescription     Payment nonce token
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   user id
 * @apiParam           {String}      token    user token
 *
 * @apiSuccessExample  {json}    Success-Response:
 *
 * {
 *  "success": true,
 *  "success_message": "Client_token",
 *  "client_token": "eyJ2ZXJzaW9uIjoyLCJhdXRob3JpemF0aW9uRmluZ2VycHJpbnQiOiIxMzEyZWQxNmUwOTRjYTVjODRiNTE1MGNiODllMTdmYjA2YWQ2NzZjNGRjOGQwMGY3YzI2YjM0ZDE0Y2E1MWM4fGNyZWF0ZWRfYXQ9MjAxNy0xMS0wN1QwNzoxNjo1OC40MjE5NDAzNjkrMDAwMFx1MDAyNm1lcmNoYW50X2lkPWR6eXJtNW5jN2g5anIzbnJcdTAwMjZwdWJsaWNfa2V5PTNjeHJ5cXd5ZzljeXE3bXEiLCJjb25maWdVcmwiOiJodHRwczovL2FwaS5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tOjQ0My9tZXJjaGFudHMvZHp5cm01bmM3aDlqcjNuci9jbGllbnRfYXBpL3YxL2NvbmZpZ3VyYXRpb24iLCJjaGFsbGVuZ2VzIjpbXSwiZW52aXJvbm1lbnQiOiJzYW5kYm94IiwiY2xpZW50QXBpVXJsIjoiaHR0cHM6Ly9hcGkuc2FuZGJveC5icmFpbnRyZWVnYXRld2F5LmNvbTo0NDMvbWVyY2hhbnRzL2R6eXJtNW5jN2g5anIzbnIvY2xpZW50X2FwaSIsImFzc2V0c1VybCI6Imh0dHBzOi8vYXNzZXRzLmJyYWludHJlZWdhdGV3YXkuY29tIiwiYXV0aFVybCI6Imh0dHBzOi8vYXV0aC52ZW5tby5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tIiwiYW5hbHl0aWNzIjp7InVybCI6Imh0dHBzOi8vY2xpZW50LWFuYWx5dGljcy5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tL2R6eXJtNW5jN2g5anIzbnIifSwidGhyZWVEU2VjdXJlRW5hYmxlZCI6dHJ1ZSwicGF5cGFsRW5hYmxlZCI6dHJ1ZSwicGF5cGFsIjp7ImRpc3BsYXlOYW1lIjoidGVzdCIsImNsaWVudElkIjpudWxsLCJwcml2YWN5VXJsIjoiaHR0cDovL2V4YW1wbGUuY29tL3BwIiwidXNlckFncmVlbWVudFVybCI6Imh0dHA6Ly9leGFtcGxlLmNvbS90b3MiLCJiYXNlVXJsIjoiaHR0cHM6Ly9hc3NldHMuYnJhaW50cmVlZ2F0ZXdheS5jb20iLCJhc3NldHNVcmwiOiJodHRwczovL2NoZWNrb3V0LnBheXBhbC5jb20iLCJkaXJlY3RCYXNlVXJsIjpudWxsLCJhbGxvd0h0dHAiOnRydWUsImVudmlyb25tZW50Tm9OZXR3b3JrIjp0cnVlLCJlbnZpcm9ubWVudCI6Im9mZmxpbmUiLCJ1bnZldHRlZE1lcmNoYW50IjpmYWxzZSwiYnJhaW50cmVlQ2xpZW50SWQiOiJtYXN0ZXJjbGllbnQzIiwiYmlsbGluZ0FncmVlbWVudHNFbmFibGVkIjp0cnVlLCJtZXJjaGFudEFjY291bnRJZCI6ImNyZWF0ZV9uZXdfbXV0YW50IiwiY3VycmVuY3lJc29Db2RlIjoiSU5SIn0sIm1lcmNoYW50SWQiOiJkenlybTVuYzdoOWpyM25yIiwidmVubW8iOiJvZmYifQ=="
 * }
 *
 */

$router->post('/application/client_token', [
    'as' => 'payment@client_token',
    'uses' => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api',
    ]
]);



