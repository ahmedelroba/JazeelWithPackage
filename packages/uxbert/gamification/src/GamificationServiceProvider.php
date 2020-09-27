<?php

namespace Uxbert\Gamification;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\Artisan;
use Uxbert\Gamification\Http\Middleware\VerifyCsrfToken;
use Uxbert\Gamification\Http\Middleware\SetAPILocaleMiddleware;
use Uxbert\Gamification\Providers\EventServiceProvider;

class GamificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'UxbertGamification');
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
        // Artisan::call('l5-swagger:generate');

        $this->publishes([
            __DIR__ . '/Swagger' => config_path('/../app/'),
        ]);


        // middlewares
        $kernel = $this->app->make(Kernel::class);
        // $kernel->pushMiddleware(VerifyCsrfToken::class);
        $kernel->pushMiddleware(SetAPILocaleMiddleware::class);

        Validator::extend('unique_custom', function ($attribute, $value, $parameters) {
            // Get the parameters passed to the rule
            list($table, $field, $field2, $field2Value) = $parameters;

            // Check the table and return true only if there are no entries matching
            // both the first field name and the user input value as well as
            // the second field name and the second field value
            return DB::table($table)->where($field, $value)->where($field2, $field2Value)->count() == 0;
        });

        Validator::extend('unique_custom_with_prod', function ($attribute, $value, $parameters) {
            // Get the parameters passed to the rule
            list($table, $field, $field2, $field2Value) = $parameters;

            // Check the table and return true only if there are no entries matching
            // both the first field name and the user input value as well as
            // the second field name and the second field value
            return DB::table($table)->where($field, 'prod-' . $value)->where($field2, $field2Value)->count() == 0;
        });
    }
}
