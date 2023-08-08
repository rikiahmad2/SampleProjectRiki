<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Mail\PostNotification;
use Illuminate\Support\Facades\Mail;

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
        $posts = Post::where('sent', false)->get();

        foreach ($posts as $post) {
            foreach ($post->website->subscribers as $subscriber) {
                Mail::to($subscriber->email)->queue(new PostNotification($post));
                $post->update(['sent' => true]);
            }
        }

        $this->info('Post notifications sent successfully.');
    }
}
