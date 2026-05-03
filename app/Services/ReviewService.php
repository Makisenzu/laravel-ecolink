<?php

namespace App\Services;

use App\Repositories\Interfaces\ReviewRepositoryInterface;

class ReviewService 
{
    protected $reviewRepository;

    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function getAllReviews()
    {
        return $this->reviewRepository->allReviews();
    }

    public function createReview(array $data)
    {
        return $this->reviewRepository->createReview($data);
    }

    public function getReviewById(int $id)
    {
        return $this->reviewRepository->findReviewById($id);
    }

    public function updateReview(int $id, array $data)
    {
        return $this->reviewRepository->updateReview($id, $data);
    }

    public function deleteReview(int $id)
    {
        return $this->reviewRepository->deleteReview($id);
    }
}