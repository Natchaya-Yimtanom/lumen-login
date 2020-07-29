<?php

namespace Quinn\Login;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'quinn-login:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish all';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Publishing all files');
        $this->call('quinn-login:publish-migrations');
        $this->call('quinn-login:publish-controller');
    }
}