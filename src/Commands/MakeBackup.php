<?php

namespace Lpfuri\LaravelDemoMode\Commands;

use Lpfuri\LaravelDemoMode\Helper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class MakeBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo-mode:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a database backup';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(!Storage::exists(Helper::folder()))
            Storage::makeDirectory(Helper::folder());

        $process = new Process([

            'mysqldump',
            '--user='.Helper::dbUsername(),
            '--password='.Helper::dbPassword(),
            Helper::dbName(),
            '--result-file='.Helper::backupPath()

        ]);

        $process->run();

        $process->isSuccessful()
            ? $this->info('Backup file ready.')
            : $this->error('The backup process has failed.');
    }
}
