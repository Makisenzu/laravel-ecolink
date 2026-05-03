<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreSiteRequest;
use App\Http\Requests\Api\V1\UpdateSiteRequest;
use App\Http\Resources\SiteResource;
use App\Models\Site;
use App\Services\SiteService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class SiteController extends Controller
{
    use ApiResponse;

    public function __construct(
        protected SiteService $siteService
    ) {}

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

    public function update(UpdateSiteRequest $request, Site $site): JsonResponse
    {
        $site = $this->siteService->updateSite($site->id, $request->validated());

        if (! $site) {
            return $this->notFound('Site not found');
        }

        return $this->success(new SiteResource($site), 'Site updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->siteService->deleteSite($id);

        if (! $deleted) {
            return $this->notFound('Site not found');
        }

        return $this->success(null, 'Site deleted successfully');
    }
}