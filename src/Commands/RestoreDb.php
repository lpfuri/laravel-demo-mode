<?php

namespace Lpfuri\LaravelDemoMode\Commands;

use Lpfuri\LaravelDemoMode\Helper;
use Lpfuri\LaravelDemoMode\Facades\DemoMode;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class RestoreDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo-mode:restore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restores database using backup file';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if(!Storage::exists(
            Helper::backupPath(false)
        )){
            $this->error("There's no backup file");
            return;

        }

        if(DemoMode::isDemoModeOn()){

            $process = new Process([

                'mysql',
                '--user='.Helper::dbUsername(),
                '--password='.Helper::dbPassword(),
                '--database='.Helper::dbName(),
                '-e SOURCE '.Helper::backupPath()

            ]);

            $process->run();

            $process->isSuccessful()
                ? $this->info("Database has been restored.")
                : $this->error("The restoring process has failed.");

        }else{

            $this->error("Can't restore database while demo mode is off.");

        }
    }
}
