<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Modules\Auth\Repositories\IUserRepository',
            'App\Modules\Auth\Repositories\Impl\EloquentUserRepository',
        );
        
        /**Organization */
        $this->app->bind(
            'App\Modules\Organization\Repositories\ICompanyRepository',
            'App\Modules\Organization\Repositories\Impl\EloquentCompanyRepository',
        );

        $this->app->bind(
            'App\Modules\Organization\Repositories\IEmployeeRepository',
            'App\Modules\Organization\Repositories\Impl\EloquentEmployeeRepository',
        );

        /**Map */
        $this->app->bind(
            'App\Modules\Map\Repositories\IMapRepository',
            'App\Modules\Map\Repositories\Impl\EloquentMapRepository',
        );

        $this->app->bind(
            'App\Modules\Map\Repositories\ISourceRepository',
            'App\Modules\Map\Repositories\Impl\EloquentSourceRepository',
        );

        $this->app->bind(
            'App\Modules\Map\Repositories\ILayerRepository',
            'App\Modules\Map\Repositories\Impl\EloquentLayerRepository',
        );

        $this->app->bind(
            'App\Modules\Data\Repositories\IEntityRepository',
            'App\Modules\Data\Repositories\Impl\EloquentEntityRepository',
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
