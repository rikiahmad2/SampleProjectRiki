<?php

namespace App\Swagger;

/**
 * @OA\Schema(
 *     schema="Website",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="url", type="string"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time"),
 * )
 *
 * @OA\Schema(
 *     schema="WebsitePagination",
 *     @OA\Property(property="current_page", type="integer"),
 *     @OA\Property(property="per_page", type="integer"),
 *     @OA\Property(property="total", type="integer"),
 *     @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Website")),
 * )
 * @OA\Schema(
 *     schema="Post",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="website_id", type="integer"),
 *     @OA\Property(property="title", type="string"),
 *     @OA\Property(property="description", type="string"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time"),
 * )
 */
class OpenApiSchemas
{
    // This class is just for organizing your reusable schemas
}