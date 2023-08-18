<?php
namespace App\Console\Commands;

use App\Models\Post;
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
        $chunkSize = 100;
        Post::chunk($chunkSize, function ($posts) {
            foreach ($posts as $post) {
                $this->info('Processing post: ' . $post->title);
                
                // Get subscribers related to the post's website
                $subscribers = $post->website->subscribers;
                
                // Attach subscribers to the post
                foreach ($subscribers as $subscriber) {
                    $post->subscribers()->attach($subscriber->id, ['status' => false]);
                }
                
                // Mark the post as sent
                $post->update(['sent' => true]);
            }
        });   
    }
}
