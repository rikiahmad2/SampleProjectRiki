<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;
use App\Mail\PostNotification;
use Illuminate\Support\Facades\Mail;

class SendPostNotificationsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        $posts = Post::where('sent', false)->get();

        foreach ($posts as $post) {
            foreach ($post->website->subscribers as $subscriber) {
                Mail::to($subscriber->email)->send(new PostNotification($post));
                $post->update(['sent' => true]);
            }
        }
    }
}
