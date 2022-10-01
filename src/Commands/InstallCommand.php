<?php

namespace ManeOlawale\Laravel\Package\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepares package for use';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Setting up Package');
        $this->line('');

        $this->call('vendor:publish', [
            '--tag' => 'package.config'
        ]);

        $this->line('');
        $this->info('Package installed sucessfully!!');
    }
}
