<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
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
        Permission::with('feature')->get()->each(function ($permission) {
            $gateName = strtolower($permission->name . '-' . $permission->feature->name);
            Gate::define($gateName, function ($user) use ($permission) {
                return $user->hasPermissionForFeature($permission->name, $permission->feature->name);
            });
        });
    }
}