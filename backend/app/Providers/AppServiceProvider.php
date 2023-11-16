<?php

namespace App\Providers;

use App\Domain\Category\Repositories\CategoryRepository;
use App\Domain\Product\Repositories\ProductRepository;
use App\Repositories\Constracts\CategoryRepositoryInterface;
use App\Repositories\Constracts\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
