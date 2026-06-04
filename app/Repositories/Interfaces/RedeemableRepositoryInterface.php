<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Redeemable;

interface RedeemableRepositoryInterface
{
    public function all(): LengthAwarePaginator;
    public function getRedeemableById(int $id): ?Redeemable;
    public function getRedeemableByCategory(int $category): LengthAwarePaginator;
    public function getRedeemableByPointRange(int $minPoint, int $maxPoint): LengthAwarePaginator;
    public function updateRedeemable(int $id, array $data): ?Redeemable;
    public function deleteRedeemable(int $id): bool;
}
