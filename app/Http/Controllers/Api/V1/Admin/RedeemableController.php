<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreRedeemableRequest;
use App\Http\Requests\Api\V1\UpdateRedeemableRequest;
use App\Http\Resources\RedeemableResource;
use App\Services\RedeemableService;
use App\Traits\ApiResponse;

class RedeemableController extends Controller
{
    use ApiResponse;

    public function __construct
    (
        protected RedeemableService $redeemableService
    ){}

    public function index()
    {
        $redeemables = $this->redeemableService->getAllRedeemable();
        return $this->success(RedeemableResource::collection($redeemables)->response()->getData(true));
    }

    public function store(StoreRedeemableRequest $request)
    {
        $redeemable = $this->redeemableService->createRedeemable($request->validated());
        return $this->success(new RedeemableResource($redeemable), 'Redeemable created successfully');
    }

    public function show(int $id)
    {
        $redeemable = $this->redeemableService->getRedeemableById($id);
        if (! $redeemable) {
            return $this->notFound('Redeemable not found');
        }

        return $this->success(new RedeemableResource($redeemable));
    }

    public function update(UpdateRedeemableRequest $request, int $id)
    {
        $redeemable = $this->redeemableService->updateRedeemable($id, $request->validated());
        if (! $redeemable) {
            return $this->notFound('Redeemable not found');
        }

        return $this->success(new RedeemableResource($redeemable), 'Redeemable updated successfully');
    }

    public function destroy(int $id)
    {
        $redeemable = $this->redeemableService->deleteRedeemable($id);
        if (! $redeemable) {
            return $this->notFound('Redeemable not found');
        }

        return $this->success(null, 'Redeemable deleted successfully');
    }
}
