<?php

namespace App\Repositories\Eloquent;

use App\Models\Redeemable;
use App\Repositories\Interfaces\RedeemableRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class RedeemableRepository implements RedeemableRepositoryInterface {
    public function all():LengthAwarePaginator {
        return Redeemable::latest()->paginate(10);
    }

    public function getRedeemableById(int $id): ?Redeemable{
        return Redeemable::find($id);
    }

    public function getRedeemableByCategory(int $category): LengthAwarePaginator{
        return Redeemable::where('redeemable_category_id', $category)->paginate(10);
    }

    public function getRedeemableByPointRange(int $minPoint, int $maxPoint): LengthAwarePaginator{
        return Redeemable::whereBetween('points_required', [$minPoint, $maxPoint])->paginate(10);
    }
    public function createRedeemable(array $data): Redeemable{
        return Redeemable::create($data);
    }
    
    public function updateRedeemable(int $id, array $data): ?Redeemable{
        $redeemable = Redeemable::find($id);
        $redeemable->update($data);
        return $redeemable;
    }

    public function deleteRedeemable(int $id): bool{
        $redeemable = Redeemable::find($id);
        $redeemable->delete();
        return true;
    }
}