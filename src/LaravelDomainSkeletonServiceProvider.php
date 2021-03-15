<?php

namespace Gerfey\LaravelDomainSkeleton;

use Illuminate\Support\ServiceProvider;

class LaravelDomainSkeletonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                LaravelDomainSkeletonCommand::class
            ]);
        }
    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->mergeConfigFrom(__DIR__ . '/../config/domain-skeleton.php', 'domain-skeleton');

            $this->publishes([
                __DIR__ . '/../config/domain-skeleton.php' => config_path('domain-skeleton.php'),
            ], 'domain-skeleton');
        }
    }
}
