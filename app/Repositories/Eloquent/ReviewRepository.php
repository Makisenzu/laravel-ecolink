<?php

namespace App\Repositories\Eloquent;

use App\Models\Review;
use App\Repositories\Interfaces\ReviewRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function allReviews(): LengthAwarePaginator
    {
        return Review::with(['resident', 'purok', 'reviewCategory'])->paginate(10);
    }

    public function createReview(array $data): ?Review
    {
        $review = Review::create($data);
        return $review->load(['resident', 'purok', 'reviewCategory']);

    }

    public function findReviewById(int $id): ?Review
    {
        return Review::with(['resident', 'purok', 'reviewCategory'])->find($id);
    }

    public function updateReview(int $id, array $data): ?Review
    {
        $review = $this->findReviewById($id);
        if ($review) {
            $review->update($data);
            return $review->load(['resident', 'purok', 'reviewCategory']);
        }
        return null;
    }

    public function deleteReview(int $id): bool
    {
        $review = $this->findReviewById($id);
        if ($review) {
            $review->delete();
            return true;
        }
        return false;
    }
}