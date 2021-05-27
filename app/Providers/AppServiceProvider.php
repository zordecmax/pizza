<?php

namespace App\Providers;

use App\Services\DebugResponseLogger;
use App\Services\FullRequestLogger;
use App\Services\ResponseLoggerInterface;
use App\Services\ShortRequestLogger;
use App\Services\RequestLoggerInterface;
use Illuminate\Events\Dispatcher;
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
        $this->app->bind(ResponseLoggerInterface::class, function (){
            return new DebugResponseLogger($this->app->make(LoggerInterface::class),
                $this->app->make(Dispatcher::class));
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
