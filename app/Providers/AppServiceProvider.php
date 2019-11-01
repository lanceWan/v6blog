<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        // 使用基于合成器的闭包...
        if (cache()->has('settings')) {
            $settings = cache('settings');
        }else{
            $settings = '';
        }
        View::composer('web.index', function ($view) use ($settings) {
            $view->with('settings', $settings);
        });
    }
}
