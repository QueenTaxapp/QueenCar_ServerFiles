<?php

namespace App\Containers\Authentication\Providers;

use App\Containers\Authentication\Middlewares\AccessAvailableCheck;
use App\Containers\Authentication\Middlewares\DriverTokenCheck;
use App\Containers\Authentication\Middlewares\PrivilegeCheck;
use App\Containers\Authentication\Middlewares\RoleCheck;
use App\Containers\Authentication\Middlewares\SosPrivilegeCheck;
use App\Containers\Authentication\Middlewares\SuperAdminRoleCheck;
use App\Containers\Authentication\Middlewares\WebAuthentication;
use App\Http\Middleware\Language;
use App\Ship\Parents\Providers\MiddlewareProvider;

use App\Containers\Authentication\Middlewares\Logi;

use App\Containers\Authentication\Middlewares\TableCheck;

use App\Containers\Authentication\Middlewares\Comments;

use App\Containers\Authentication\Middlewares\HeroTokenCheck;

use App\Containers\Authentication\Middlewares\UserTokenCheck;

use App\Containers\Authentication\Middlewares\ContentLanguage;
use App\Containers\Authentication\Middlewares\CompanyWebAuthentication;

use App\Containers\Authentication\Middlewares\DispatchAuthentication;


/**
 * Class MiddlewareServiceProvider
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class MiddlewareServiceProvider extends MiddlewareProvider
{

    /**
     * Register Middleware's
     *
     * @var  array
     */
    protected $middlewares = [
        // ..
    ];

    /**
     * Register Container Middleware Groups
     *
     * @var  array
     */
    protected $middlewareGroups = [
        'web' => [
            // ..
            'tablecheck.web' => TableCheck::class,
            'Comments.web' => Comments::class,
           // 'Language'     => Language::class,


        ],
        'api' => [
            // ..
            'ContentLanguage.api' => ContentLanguage::class,
        ],
    ];

    protected $routeMiddleware = [
        // apiato User Authentication middleware for Web Pages
        'auth.web' => WebAuthentication::class,

        'accessCheck.web' => AccessAvailableCheck::class,

        'logi.web' => Logi::class,

        'companyAuth.web'=> CompanyWebAuthentication::class,

        'userTokenCheck.api' => UserTokenCheck::class,

        'DriverTokenCheck.api' => DriverTokenCheck::class,

        'DispatchTokenCheck.api' => DispatchAuthentication::class,

        'Role.web'=> RoleCheck::class,

        'Privilege.web' =>PrivilegeCheck::class,

        'SuperAdminRole.web'=> SuperAdminRoleCheck::class,
        // ..
    ];

}
