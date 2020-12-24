<?php

namespace App\Modules\Category;

use App\Modules\Category\Commands\CategoryCommand;
use App\Modules\Category\Services\CategoryService;
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

        $this->loadViewsFrom(__DIR__.'/Views', 'category');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(CategoryService::class, function () {
            return new CategoryService();
        });

        $this->app->alias(CategoryService::class, 'CategoryService');
    }
}
