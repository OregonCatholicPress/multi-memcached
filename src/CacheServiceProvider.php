<?php

namespace OregonCatholicPress\Cache;

use Illuminate\Cache\CacheServiceProvider as IlluminateCacheServiceProvider;

class CacheServiceProvider extends IlluminateCacheServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('cache', function ($app) {
            return new CacheManager($app);
        });

        $this->app->singleton('cache.store', function ($app) {
            return $app['cache']->driver();
        });

        $this->app->singleton('memcached.connector', function () {
            return new MemcachedConnector();
        });

        $this->registerCommands();
    }
}
