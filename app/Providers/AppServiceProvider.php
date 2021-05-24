<?php

namespace App\Providers;

use App\Services\FullRequestLogger;
use App\Services\ShortRequestLogger;
use App\Services\RequestLoggerInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Psr\Log\LoggerInterface;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RequestLoggerInterface::class, function (){
            $logger = NULL;
            if(App::environment('local')){
                $logger = new FullRequestLogger($this->app->make(LoggerInterface::class));
            } elseif(App::environment('production')){
                $logger = new ShortRequestLogger($this->app->make(LoggerInterface::class));
            }
            return $logger;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
