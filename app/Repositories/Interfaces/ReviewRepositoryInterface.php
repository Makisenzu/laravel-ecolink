<?php

namespace App\Repositories\Interfaces;

use App\Models\Review;
use Illuminate\Pagination\LengthAwarePaginator;

interface ReviewRepositoryInterface
{
    public function allReviews(): LengthAwarePaginator;
    public function createReview(array $data): ?Review;
    public function findReviewById(int $id): ?Review;
    public function updateReview(int $id, array $data): ?Review;
    public function deleteReview(int $id): bool;
}
