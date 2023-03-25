<?php

namespace Lpfuri\LaravelDemoMode\Commands;

use Lpfuri\LaravelDemoMode\Helper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DemoModeOn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo-mode:on';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets application in demo mode';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if(Storage::exists(Helper::folder().'/demo-mode')){

            $this->warn('Application is in demo mode already.');

            return;

        }

        Storage::put(Helper::folder().'/demo-mode', '');

        $this->info('Application is now in demo mode.');
    }
}
