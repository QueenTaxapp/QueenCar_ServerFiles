<?php

namespace Apiato\Core\Abstracts\Providers;

use Apiato\Core\Loaders\RoutesLoaderTrait;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as LaravelRouteServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;

/**
 * Class RoutesProvider
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class RoutesProvider extends LaravelRouteServiceProvider
{

    use RoutesLoaderTrait;

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace;

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->runRoutesAutoLoader();
    }


//    public function map(Router $router, Request $request)
//    {
//
//        $this->runRoutesAutoLoader();
//        $locale = $request->segment(1);
//
//
//        $this->app->setLocale($locale);
//
//        $router->group(['namespace' => $this->namespace, 'prefix' => $locale], function($router) {
//            //require app_path('Http/routes.php');
//
//
//        });
//    }
}
