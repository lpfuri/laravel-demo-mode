<?php

namespace Lpfuri\LaravelDemoMode;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Console\Scheduling\Schedule;
use Facades\DemoMode;

class DemoModeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->runningInConsole()){

            $this->publishConfig();

        }

        $this->listenUserEvents();



        if(DemoMode::isDemoModeOn()){

            $this->app->booted(function () {

                $schedule = $this->app->make(Schedule::class);

                $schedule->command(Commands\RestoreDb::class)->{config('demo-mode.restoring_period')}();

            });

        }
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__.'/config/demo-mode.php' => config_path('demo-mode.php'),
        ], 'config');
    }

    protected function listenUserEvents()
    {
        Event::listen(config('demo-mode.user_updating_event'), function ($user) {

            if($user->getKey() == config('demo-mode.demo_user_id'))
                if(DemoMode::isDemoModeOn())
                    throw new \Exception("This user cannot be changed", config('demo-mode.error_code'));
                
        });


        Event::listen(config('demo-mode.user_deleting_event'), function ($user) {

            if($user->getKey() == config('demo-mode.demo_user_id'))
                if(DemoMode::isDemoModeOn())
                    throw new \Exception("This user cannot be deleted", config('demo-mode.error_code'));
                
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
         $this->registerConfig();
         $this->registerFacade();
         $this->registerCommands();
    }

    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/demo-mode.php', 'demo-mode'
        );
    }   

    protected function registerFacade()
    {
        $this->app->singleton('DemoMode', function(){

            return new DemoModeManager();

        });
    }

    protected function registerCommands()
    {
        $this->commands(Commands\DemoModeOn::class);
        $this->commands(Commands\DemoModeOff::class);
        $this->commands(Commands\MakeBackup::class);
        $this->commands(Commands\RestoreDb::class);
    }
}
