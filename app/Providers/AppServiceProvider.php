<?php

namespace App\Providers;

use App\Models\SubscriptionHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        View::composer('include.nav-header', function ($view) {
            $activeSubscription = null;

            if (Auth::check()) {
                $activeSubscription = SubscriptionHistory::where('user_id', Auth::id())
                    ->where('status', 'active')
                    ->whereDate('end_date', '>=', now())
                    ->latest('end_date')
                    ->first();
            }

            $view->with('activeSubscription', $activeSubscription);
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
