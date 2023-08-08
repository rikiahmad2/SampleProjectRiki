<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendPostNotifications extends Command
{
    protected $signature = 'notifications:sendposts';
    protected $description = 'Send post notifications to subscribers';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        dispatch(new \App\Jobs\SendPostNotificationsJob());
        $this->info('Post notifications job dispatched.');
    }
}
