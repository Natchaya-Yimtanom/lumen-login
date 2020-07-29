<?php

namespace Quinn\Login;

use Illuminate\Console\Command;
use Quinn\Login\Helpers\Publisher;

class PublishController extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'quinn-login:publish-controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish controller';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Publishing controller files');

        (new Publisher($this))->publishFile(
            realpath(__DIR__.'/../../src/Console/').'/CallControllers.php',
            base_path('app/Http/Controllers'),'CallControllers.php'
        );
    }
}