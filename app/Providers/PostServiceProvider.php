<?php

namespace App\Providers;

use Facebook\Facebook;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Facebook::class, function ($app) {
            $config = config('services.facebook');
            return new Facebook([
                'app_id' => env('FACEBOOK_CLIENT_ID'),
                'app_secret' => env('FACEBOOK_CLIENT_SECRET'),
                // 'redirect' => 'http://laravel:8000/login/facebook/callback',
                'default_graph_version' => 'v5.0',
            ]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
