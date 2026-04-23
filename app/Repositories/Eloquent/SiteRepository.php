<?php

namespace App\Repositories\Eloquent;

use App\Models\Site;
use App\Repositories\Interfaces\SiteRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class SiteRepository implements SiteRepositoryInterface
{
    public function all(): LengthAwarePaginator
    {
        return Site::with('purok')->paginate(10);
    }

    public function getSiteById(int $id): ?Site
    {
        return Site::find($id);
    }

    public function addNewSite(array $data): Site
    {
        return Site::create($data);
    }

    public function updateSite(int $id, array $data): ?Site
    {
        $site = Site::find($id);
        if ($site) {
            $site->update($data);
            return $site;
        }
        return null;
    }

    public function deleteSite(int $id): bool
    {
        $site = Site::find($id);
        if ($site) {
            return $site->delete();
        }
        return false;
    }
}