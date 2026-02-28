<?php

namespace App\Providers;

use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function register(): void
    {
       $this->app->singleton(ProductService::class, function ($app) {
         $products = [
            ['id' => 1, 
            'name' => 'Brocolli', 
            'category' => 'vegetable'],

            ['id' => 2, 
            'name' => ' Squash', 
            'category' => 'vegetable'],

            ['id' => 3, 
            'name' => 'Sayote', 
            'category' => 'vegetable'],
         ];
         return new ProductService($products);
       });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->share('productKey','Abc');
    }
}
