<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            
            /**Auth */
            
            Route::middleware('api')
                ->namespace('')
                ->group(base_path('app/Modules/Auth/Routes/AuthRoutes.php'));

            Route::middleware('api')
                ->namespace('')
                ->group(base_path('app/Modules/Auth/Routes/UserRoutes.php'));

            /**Organization */

            Route::middleware('api')
                ->namespace('')
                ->group(base_path('app/Modules/Organization/Routes/CompanyRoutes.php'));

            Route::middleware('api')
                ->namespace('')
                ->group(base_path('app/Modules/Organization/Routes/EmployeeRoutes.php'));

            Route::middleware('api')
                ->namespace('')
                ->group(base_path('app/Modules/Organization/Routes/DashboardRoutes.php'));

            /**Data */

            Route::middleware('api')
                ->namespace('')
                ->group(base_path('app/Modules/Data/Routes/EntityRoutes.php'));

            Route::middleware('api')
                ->namespace('')
                ->group(base_path('app/Modules/Data/Routes/PipaRoutes.php'));

            Route::middleware('api')
                ->namespace('')
                ->group(base_path('app/Modules/Data/Routes/PelangganRoutes.php'));

            Route::middleware('api')
                ->namespace('')
                ->group(base_path('app/Modules/Data/Routes/WatermeterRoutes.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
