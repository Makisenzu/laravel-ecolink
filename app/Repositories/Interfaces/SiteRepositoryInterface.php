<?php

namespace App\Repositories\Interfaces;

use App\Models\Site;
use Illuminate\Pagination\LengthAwarePaginator;

interface SiteRepositoryInterface
{
    public function all(): LengthAwarePaginator;
    public function getSiteById(int $id): ?Site;
    public function addNewSite(array $data): Site;
    public function updateSite(int $id, array $data): ?Site;
    public function deleteSite(int $id): bool;
}
