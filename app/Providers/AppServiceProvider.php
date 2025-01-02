<?php

namespace App\Providers;


use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\ICommentRepository;
use App\Repositories\Dashboard\DashboardRepository;
use App\Repositories\Dashboard\IDashboardRepository;
use App\Repositories\Idea\IdeaRepository;
use App\Repositories\Idea\IIdeaRepository;
use App\Repositories\Images\IImagesRepository;
use App\Repositories\Images\ImagesRepository;
use App\Repositories\Like\ILikeRepository;
use App\Repositories\Like\LikeRepository;
use App\Repositories\RegisterRepository\IRegisterRepository;
use App\Repositories\RegisterRepository\RegisterRepository;
use App\Rules\CustomLoginValidate;
use App\Services\Comment\CommentService;
use App\Services\Comment\ICommentService;
use App\Services\Dashboard\DashboardService;
use App\Services\Dashboard\IDashboardService;
use App\Services\Idea\IdeaService;
use App\Services\Idea\IIdeaService;
use App\Services\Images\IImagesService;
use App\Services\Images\ImagesService;
use App\Services\Like\ILikeService;
use App\Services\Like\LikeService;
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


        $this->app->bind(ICommentService::class, CommentService::class);
        $this->app->bind(ICommentRepository::class, CommentRepository::class);

        $this->app->bind(IDashboardService::class, DashboardService::class);
        $this->app->bind(IDashboardRepository::class, DashboardRepository::class);

        $this->app->bind(IIdeaService::class, IdeaService::class);
        $this->app->bind(IIdeaRepository::class, IdeaRepository::class);

        $this->app->bind(ILikeService::class, LikeService::class);
        $this->app->bind(ILikeRepository::class, LikeRepository::class);

        $this->app->bind(IImagesService::class, ImagesService::class);
        $this->app->bind(IImagesRepository::class, ImagesRepository::class);


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
