<?php

namespace App\Providers;

use App\Repositories\RegisterRepository\IRegisterRepository;
use App\Repositories\RegisterRepository\RegisterRepository;
use App\Rules\CustomLoginValidate;
use App\Services\RegisterService\IRegisterService;
use App\Services\RegisterService\RegisterService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Validated;
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

        Validator::extend('no_spaces', function ($attribute, $value, $parameters, $validator) {
            return (new CustomLoginValidate('no_spaces'))->passes($attribute, $value);
        });
        Validator::replacer('no_spaces', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, (new CustomLoginValidate('no_spaces'))->message());
        });
    }
}
