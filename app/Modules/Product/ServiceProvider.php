<?php

namespace App\Modules\Product;

use App\Modules\Product\Services\ProductService;
use Illuminate\Support\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadRoutesFrom(__DIR__.'/Routes/api.php');
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

        $this->loadViewsFrom(__DIR__.'/Views', 'product');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(ProductService::class, function () {
            return new ProductService();
        });

        $this->app->alias(ProductService::class, 'ProductService');
    }
}
