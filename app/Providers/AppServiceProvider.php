<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Local
        Model::preventLazyLoading(! app()->isProduction());

        // Local (C:\www\cutcode_shop\public\app\Models\User.php - $fillable)
        Model::preventSilentlyDiscardingAttributes(! app()->isProduction());

        Paginator::useBootstrapFour();
    }
}
