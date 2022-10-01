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
        $this->line("<info>Setting up Package</info>");
        $this->line("");

        $this->call('vendor:publish', [
            '--tag' => 'package.config'
        ]);

        $this->line("");
        $this->line("<info>Package installed sucessfully!!</info>");
    }
}
