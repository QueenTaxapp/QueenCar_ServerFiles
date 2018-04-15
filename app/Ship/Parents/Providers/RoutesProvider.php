<?php

namespace App\Ship\Parents\Providers;

use Apiato\Core\Abstracts\Providers\RoutesProvider as AbstractRoutesProvider;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
/**
 * Class RoutesProvider.
 *
 * A.K.A app/Providers/RouteServiceProvider.php
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class RoutesProvider extends AbstractRoutesProvider
{

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot()
    {
        parent::boot();
    }




}
