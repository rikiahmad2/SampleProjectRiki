<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use Illuminate\Support\Facades\Validator;


class SubscriberController extends Controller
{

    /**
     * @OA\Post(
     *      path="/websites/{website}/subscribe",
     *      operationId="subscribeToWebsite",
     *      tags={"Websites"},
     *      summary="Subscribe to a website",
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
     *              @OA\Property(property="email", type="string", format="email", example="user@example.com")
     *          )
     *      ),
     *      @OA\Response(
     *          response="201",
     *          description="Subscriber created successfully",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Subscribed successfully"),
     *              @OA\Property(property="subscriber", type="object",
     *                  @OA\Property(property="id", type="integer"),
     *                  @OA\Property(property="email", type="string", format="email"),
     *                  @OA\Property(property="website_id", type="integer"),
     *                  @OA\Property(property="created_at", type="string", format="date-time"),
     *                  @OA\Property(property="updated_at", type="string", format="date-time")
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response="422",
     *          description="Validation errors",
     *          @OA\JsonContent(
     *              @OA\Property(property="errors", type="object", example={"email": {"The email field is required."}})
     *          )
     *      )
     * )
     */
    public function subscribe(Request $request, Website $website)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email,NULL,id,website_id,' . $website->id,
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Validation failed
        }

        $subscriber = $website->subscribers()->create($validator->validated());
        return response()->json(['message' => 'Subscribed successfully', 'subscriber' => $subscriber], 201);
    }
}
