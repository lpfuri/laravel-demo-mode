<?php

namespace Lpfuri\LaravelDemoMode\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DemoModeOff extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo-mode:off';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets application out of demo mode';
    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(!Storage::exists(config('demo-mode.folder').'/demo-mode')){

            $this->warn('Application is out of demo mode already.');

            return;

        }

        Storage::delete(config('demo-mode.folder').'/demo-mode');

        $this->info('Application is out of demo mode.');
    }
}
