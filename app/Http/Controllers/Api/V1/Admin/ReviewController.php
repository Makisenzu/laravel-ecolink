<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreReviewRequest;
use App\Http\Requests\Api\V1\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
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

    public function store(StoreReviewRequest $request)
    {
        $review = $this->reviewService->createReview($request->validated());

        return $this->success(new ReviewResource($review), 'Review created successfully', 201);
    }

    public function show(Review $review)
    {
        $review = $this->reviewService->getReviewById($review->id);

        if (! $review) {
            return $this->notFound('Review not found');
        }

        return $this->success(new ReviewResource($review));
    }

    public function update(UpdateReviewRequest $request, Review $review)
    {
        $review = $this->reviewService->updateReview($review->id, $request->validated());

        if (! $review) {
            return $this->notFound('Review not found');
        }

        return $this->success(new ReviewResource($review), 'Review updated successfully');
    }

    public function destroy(Review $review)
    {
        $deleted = $this->reviewService->deleteReview($review->id);

        if (! $deleted) {
            return $this->notFound('Review not found');
        }

        return $this->success(null, 'Review deleted successfully');
    }
}
