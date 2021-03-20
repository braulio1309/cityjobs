<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		$this->app->bind('path.public', function() {
			return '/var/www/vhosts/39617074.servicio-online.net/cityjob.es';
		});
	}

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Inertia::share([
            "flash" => function () {
                return [
                    "status" => session("status"),
                    "success" => session("success"),
                    "error" => session("error"),
                ];
            },
            "request" => function () {
                return [
                    "token" => request()->route("token"),
                ];
            }
        ]);
    }
}
