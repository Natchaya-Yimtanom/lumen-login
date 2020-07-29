<?php

namespace Quinn\Login;

use Illuminate\Console\Command;
use Quinn\Login\Helpers\Publisher;

class PublishMigrations extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'quinn-login:publish-migrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish migrations';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Publishing migrations files');

        (new Publisher($this))->publishFile(
            realpath(__DIR__.'/../../database/migrations/').'/2020_07_22_035332_create_login_table.php',
            database_path('migrations'),
            '2020_07_22_035332_create_login_table.php'
        );
    }
}