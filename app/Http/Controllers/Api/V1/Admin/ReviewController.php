<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewService;
use App\Traits\ApiResponse;

class ReviewController extends Controller
{
    use ApiResponse;

    public function __construct
    (
        protected ReviewService $reviewService
    )
    {}

    public function index()
    {
        $reviews = $this->reviewService->getAllReviews();

        return $this->success(ReviewResource::collection($reviews)->response()->getData(true));
    }
}
