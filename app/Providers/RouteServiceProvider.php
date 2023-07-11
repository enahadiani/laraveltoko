<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapEsakuRoutes();

        $this->mapAdmGinasRoutes();

        $this->mapWebginasRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapEsakuRoutes()
    {
        Route::prefix('esaku-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/esaku/auth.php'));

        Route::prefix('esaku-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/esaku/dash.php'));

        Route::prefix('esaku-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/esaku/master.php'));

        Route::prefix('esaku-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/esaku/trans.php'));

        Route::prefix('esaku-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/esaku/report.php'));
    }

    protected function mapAdmGinasRoutes()
    {
        Route::prefix('admginas-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admginas/auth.php'));

        Route::prefix('admginas-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admginas/dash.php'));

        Route::prefix('admginas-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admginas/master.php'));

        Route::prefix('admginas-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admginas/trans.php'));

        Route::prefix('admginas-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admginas/report.php'));
    }

    protected function mapWebginasRoutes()
    {
        Route::prefix('webginas')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/webginas/web.php'));

        Route::prefix('webginas2')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/webginas/web2.php'));
    }

    
}
