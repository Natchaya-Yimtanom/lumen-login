<?php

namespace Quinn\Login;

use Illuminate\Support\ServiceProvider;
use Quinn\Login\PublishCommand;
use Quinn\Login\PublishMigrations;
use Quinn\Login\PublishController;

class LoginServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Quinn\Login\LoginController'); 
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('command.quinn-login:publish', function () {
            return new PublishCommand();
        });

        $this->app->singleton('command.quinn-login:publish-migrations', function () {
            return new PublishMigrations();
        });

        $this->app->singleton('command.quinn-login:publish-controller', function () {
            return new PublishController();
        });

        $this->commands(
            'command.quinn-login:publish',
            'command.quinn-login:publish-migrations',
            'command.quinn-login:publish-controller'
        );
    }
}
