<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Trademark;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $trademark = Trademark::all();
        $cart = session()->get('cart');
        $category = Category::where('c_status','1')->get();
        View::share(compact('category', 'cart','trademark'));
    }
}
