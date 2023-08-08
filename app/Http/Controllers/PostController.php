<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Create a new post for a website.
     *
     * @OA\Post(
     *      path="/websites/{website}/posts",
     *      operationId="createPost",
     *      tags={"Posts"},
     *      summary="Create a new post for a website",
     *      @OA\Parameter(
     *          name="website",
     *          in="path",
     *          required=true,
     *          description="ID of the website",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="title", type="string", example="New Post Title"),
     *              @OA\Property(property="description", type="string", example="This is the post description.")
     *          )
     *      ),
     *      @OA\Response(
     *          response="201",
     *          description="Post created successfully",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Post created successfully"),
     *              @OA\Property(property="post", ref="#/components/schemas/Post")
     *          )
     *      ),
     *      @OA\Response(
     *          response="400",
     *          description="Validation errors",
     *          @OA\JsonContent(
     *              @OA\Property(property="errors", type="object", example={"title": {"The title field is required."}})
     *          )
     *      )
     * )
     */
    public function store(Request $request, Website $website)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        
        $post = Post::create([
            'website_id' => $website->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }
}
