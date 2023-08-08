<?php
namespace App\Services;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Support\Facades\Validator;

class PostService
{
    public function createPost(Website $website, array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $post = Post::create([
            'website_id' => $website->id,
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        return ['message' => 'Post created successfully', 'post' => $post];
    }
}