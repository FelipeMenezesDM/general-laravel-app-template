<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        $this->enableSSL();
        $this->appSetLocale();
        $this->schemaSetDefaultStringLength();
        $this->requestSetDefaultAcceptContent();
    }

    /**
     * Set global location for application
     *
     * @return void
     */
    private function appSetLocale() : void
    {
        App::setLocale(config('app.locale'));
    }

    /**
     * Set default string length for schema
     *
     * @return void
     */
    private function schemaSetDefaultStringLength() : void
    {
        Schema::defaultStringLength(150);
    }

    /**
     * Set global header for all request
     *
     * @return void
     */
    private function requestSetDefaultAcceptContent() : void
    {
        request()->headers->set('Accept', 'application/json');
    }

    /**
     * Enable SSL
     *
     * @return void
     */
    private function enableSSL() : void
    {
        if(env('ENABLE_SSL', false)) {
            URL::forceScheme('https');
        }
    }
}
