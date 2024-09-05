<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Contact;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('unreadContacts', Contact::where('status', 0)
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get());
        });
    }
}
