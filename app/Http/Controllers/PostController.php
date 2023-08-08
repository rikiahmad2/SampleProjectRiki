<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

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
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ];

        $result = $this->postService->createPost($website, $data);

        if (isset($result['errors'])) {
            return response()->json(['errors' => $result['errors']], 400);
        }

        return response()->json($result, 201);
    }
}
