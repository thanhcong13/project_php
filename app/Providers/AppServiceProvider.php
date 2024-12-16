<?php

namespace App\Providers;

use App\Repositories\RegisterRepository\IRegisterRepository;
use App\Repositories\RegisterRepository\RegisterRepository;
use App\Services\RegisterService\IRegisterService;
use App\Services\RegisterService\RegisterService;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind(IRegisterRepository::class, RegisterRepository::class);
        $this->app->bind(IRegisterService::class, RegisterService::class);
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
