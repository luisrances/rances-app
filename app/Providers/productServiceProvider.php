<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductService;

class productServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductService::class, function ($app) {
            $products = [
                [
                    'id' => 1,
                    'name' => 'Apple',
                    'category' => 'fruits'
                ],
                [
                    'id' => 2,
                    'name' => 'Brocolli',
                    'category' => 'vegetables'   
                ],
                [
                    'id' => 3,
                    'name' => 'Sardines',
                    'category' => 'Canned Goods'   
                ]
            ];
            return new ProductService($products);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->share('productKey', 'abc123');
    }
}
