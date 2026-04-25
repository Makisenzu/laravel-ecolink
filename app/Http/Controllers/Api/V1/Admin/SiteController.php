<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreSiteRequest;
use App\Http\Resources\SiteResource;
use App\Services\SiteService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class SiteController extends Controller implements HasMiddleware
{
    use ApiResponse;

    public function __construct(
        protected SiteService $siteService
    ) {}

    public static function middleware(): array
    {
        return [
            new Middleware('role:admin|super-admin', only: ['store', 'update', 'destroy']),
        ];
    }

    public function index(): JsonResponse
    {
        $sites = $this->siteService->getAllSites();

        return $this->success(SiteResource::collection($sites)->response()->getData(true));
    }

    public function show(int $id): JsonResponse
    {
        $site = $this->siteService->getSiteById($id);

        if (! $site) {
            return $this->notFound('Site not found');
        }

        return $this->success(new SiteResource($site));
    }

    public function store(StoreSiteRequest $request): JsonResponse
    {
        $site = $this->siteService->addSite($request->validated());

        return $this->success(new SiteResource($site), 'Site created successfully', 201);
    }
}