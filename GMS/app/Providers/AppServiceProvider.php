<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check() && Auth::user()->role === 'admin') {
                $view->with('notifications', Notification::orderBy('created_at', 'desc')->take(10)->get());
                $view->with('unreadCount', Notification::where('is_read', false)->count());
            }
        });
    }
}
