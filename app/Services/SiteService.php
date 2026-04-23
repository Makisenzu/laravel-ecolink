<?php

namespace App\Services;

use App\Repositories\Interfaces\SiteRepositoryInterface;

class SiteService
{
    protected $siteRepository;

    public function __construct(SiteRepositoryInterface $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }

    public function addSite(array $data)
    {
        return $this->siteRepository->addNewSite($data);
    }

    public function getAllSites()
    {
        return $this->siteRepository->all();
    }

    public function getSiteById(int $id)
    {
        $site = $this->siteRepository->getSiteById($id);

        if (!$site) {
            return null;
        }

        return $site;
    }

    public function updateSite(int $id, array $data)
    {
        $site = $this->siteRepository->getSiteById($id);

        if (!$site) {
            return null;
        }

        return $this->siteRepository->updateSite($id, $data);
    }

    public function deleteSite(int $id)
    {
        $site = $this->siteRepository->getSiteById($id);

        if (!$site) {
            return false;
        }

        return $this->siteRepository->deleteSite($id);
    }
}