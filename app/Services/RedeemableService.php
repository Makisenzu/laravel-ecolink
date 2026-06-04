<?php

namespace App\Services;

use App\Repositories\Interfaces\RedeemableRepositoryInterface;

class RedeemableService{

    protected $redeemableRepository;

    public function __construct(RedeemableRepositoryInterface $redeemableRepository)
    {
        $this->redeemableRepository = $redeemableRepository;
    }

    public function getAllRedeemable(){
        return $this->redeemableRepository->all();
    }

    public function getRedeemableById(int $id){
        return $this->redeemableRepository->getRedeemableById($id);
    }

    public function getRedeemableByCategory(int $category){
        return $this->redeemableRepository->getRedeemableByCategory($category);
    }

    public function getRedeemableByPointRange(int $minPoint, int $maxPoint){
        return $this->redeemableRepository->getRedeemableByPointRange($minPoint, $maxPoint);
    }
    public function createRedeemable(array $data){
        return $this->redeemableRepository->createRedeemable($data);
    }

    public function updateRedeemable(int $id, array $data){
        return $this->redeemableRepository->updateRedeemable($id, $data);
    }

    public function deleteRedeemable(int $id){
        return $this->redeemableRepository->deleteRedeemable($id);
    }
}