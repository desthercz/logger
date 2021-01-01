<?php namespace DestherCZ\Logger;

use Illuminate\Support\ServiceProvider;
use Log;
use DestherCZ\Logger\Commands\AddMigration;

class LoggerServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/email', 'logger');
        $this->publishes([
            __DIR__.'/config/logger.php' => config_path('logger.php'),
        ]);
        if (config('logger.laravel', false)) {
            Log::listen(function () {
                app(LoggerFromLaravelLogEvent::class)->handle(func_get_args());
            });
        }
    }

    public function register()
    {
        $this->app->bind('logger', function () {
            return $this->app->make(Logger::class);
        });
        $this->mergeConfigFrom(__DIR__.'/config/logger.php', 'logger');
        $this->commands(AddMigration::class);
    }
}
