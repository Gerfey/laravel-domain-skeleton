<?php

namespace App\__DOMAIN_SKELETON_DIRECTORY__\__DomainName__;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Route;

class __DomainName__ServicesProvider extends ServiceProvider
{
    protected $namespace = 'App\__DOMAIN_SKELETON_DIRECTORY__\__DomainName__\Http\Controller';

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
        }

        parent::boot();
    }

    public function map()
    {
        $this->mapRoutes();
    }

    protected function mapRoutes()
    {
        Route::middleware('api')
            ->prefix('api')
            ->namespace($this->namespace)
            ->group(base_path('app/__DOMAIN_SKELETON_DIRECTORY__/__DomainName__/Routes/api.php'));
    }
}
