<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use App\Enums\RolesEnum;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
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
        // Create symbolic link from storage/app/public to public/storage if it doesn't exist
        if (! is_link(public_path('storage'))) {
            Artisan::call('storage:link');
        }

        // Enable strict mode for Eloquent models to catch potential issues early
        Model::shouldBeStrict();

        // Use CarbonImmutable instead of Carbon to prevent accidental date mutations
        Date::use(CarbonImmutable::class);

        // Prevent destructive database commands (like dropping tables) in production
        DB::prohibitDestructiveCommands(app()->isProduction());

        // Give super admin users full access to all gates/policies by returning true
        // For non-super admins, return null to fall through to normal gate/policy checking
        Gate::before(function (User $user): ?true {
            return $user->hasRole(RolesEnum::SUPER_ADMIN) ? true : null;
        });
    }
}
