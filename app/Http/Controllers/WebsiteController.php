<?php

namespace App\Http\Controllers;

use App\Helpers\PaginationHelper;
use App\Models\Website;
use App\Services\WebsiteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use OpenApi\Annotations as OpenApi;

/**
 * @OpenApi\Info(
 *     title="Sample Project API",
 *     version="1.0",
 *     description="API documentation for testing pruposed only",
 * )
 */
class WebsiteController extends Controller
{

    protected $websiteService;
    protected $paginationService;

    public function __construct(WebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
    }

    /**
     * @OA\Get(
     *      path="/websites",
     *      operationId="getWebsitesList",
     *      tags={"Websites"},
     *      summary="Get list of websites",
     *      @OA\Response(
     *          response="200",
     *          description="List of websites",
     *          @OA\JsonContent(
     *              @OA\Property(property="current_page", type="integer"),
     *              @OA\Property(property="per_page", type="integer"),
     *              @OA\Property(property="total", type="integer"),
     *              @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Website")),
     *          )
     *      ),
     * )
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);

        $websites = $this->websiteService->getAllWebsites();
        $paginatedData = PaginationHelper::paginate($websites, $page, $perPage);

        return response()->json($paginatedData);
    }

    /**
     * @OA\Post(
     *      path="/websites",
     *      operationId="createWebsite",
     *      tags={"Websites"},
     *      summary="Create a new website",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="name", type="string", example="Sample Website"),
     *              @OA\Property(property="url", type="string", format="url", example="https://www.example.com")
     *          )
     *      ),
     *      @OA\Response(
     *          response="201",
     *          description="Website created successfully",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="integer"),
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="url", type="string", format="url"),
     *              @OA\Property(property="created_at", type="string", format="date-time"),
     *              @OA\Property(property="updated_at", type="string", format="date-time")
     *          )
     *      ),
     *      @OA\Response(
     *          response="400",
     *          description="Validation errors",
     *          @OA\JsonContent(
     *              @OA\Property(property="errors", type="object", example={"name": {"The name field is required."}})
     *          )
     *      )
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'url' => 'required|url|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        
        $data = [
            'name' => $request->input('name'),
            'url' => $request->input('url'),
        ];

        $website = $this->websiteService->createWebsite($data);
        return response()->json($website, 201);
    }
}
