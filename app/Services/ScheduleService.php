<?php

namespace App\Services;

use App\Models\CollectionQueue;
use App\Models\Site;
use App\Repositories\Interfaces\ScheduleRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ScheduleService
{
    protected $scheduleRepository;

    public function __construct(ScheduleRepositoryInterface $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function getAllSchedules()
    {
        return $this->scheduleRepository->all();
    }

    public function getSchedulesByStatus(string $status)
    {
        return $this->scheduleRepository->getScheduleByStatus($status);
    }

    public function getSchedulesByBarangayId(int $barangayId)
    {
        return $this->scheduleRepository->findSchedulesByBarangayId($barangayId);
    }

    public function getSchedulesByDriverId(int $driverId)
    {
        return $this->scheduleRepository->findScheduleByDriverId($driverId);
    }

    public function getScheduleById(int $id)
    {
        return $this->scheduleRepository->findScheduleById($id);
    }

    public function createSchedule(array $data)
    {
        return DB::transaction(function () use ($data) {
            $schedule = $this->scheduleRepository->createSchedule($data);

            $sites = $this->getGreedyOrderedSitesByBarangay($schedule->barangay_id);

            if ($sites->isNotEmpty()) {
                $queueRows = [];

                foreach ($sites as $index => $site) {
                    $queueRows[] = [
                        'schedule_id' => $schedule->id,
                        'site_id' => $site->id,
                        'queue_order' => $index + 1,
                        'status' => 'pending',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                CollectionQueue::insert($queueRows);
            }

            return $schedule;
        });
    }

    public function updateSchedule(int $id, array $data)
    {
        return $this->scheduleRepository->updateSchedule($id, $data);
    }

    public function deleteSchedule(int $id)
    {
        return $this->scheduleRepository->deleteSchedule($id);
    }

    private function getGreedyOrderedSitesByBarangay(int $barangayId)
    {
        $station = Site::where('location_type', 'station')
            ->where('status', 'active')
            ->whereHas('purok', function ($query) use ($barangayId) {
                $query->where('barangay_id', $barangayId);
            })
            ->first();

        $sites = Site::where('location_type', 'site')
            ->where('status', 'active')
            ->whereHas('purok', function ($query) use ($barangayId) {
                $query->where('barangay_id', $barangayId);
            })
            ->get();

        if ($sites->isEmpty()) {
            return $sites;
        }

        if (!$station) {
            return $sites->sortBy('id')->values();
        }

        $orderedSites = collect();
        $remainingSites = $sites->values();
        $currentSite = $station;

        while ($remainingSites->isNotEmpty()) {
            $nextSite = $remainingSites->sortBy(function (Site $site) use ($currentSite) {
                return $this->calculateDistanceKm($currentSite, $site);
            })->first();

            $orderedSites->push($nextSite);
            $remainingSites = $remainingSites->reject(function (Site $site) use ($nextSite) {
                return $site->id === $nextSite->id;
            })->values();

            $currentSite = $nextSite;
        }

        return $orderedSites;
    }

    private function calculateDistanceKm(Site $fromSite, Site $toSite): float
    {
        $earthRadiusKm = 6371;

        $fromLat = deg2rad((float) $fromSite->latitude);
        $fromLng = deg2rad((float) $fromSite->longitude);
        $toLat = deg2rad((float) $toSite->latitude);
        $toLng = deg2rad((float) $toSite->longitude);

        $deltaLat = $toLat - $fromLat;
        $deltaLng = $toLng - $fromLng;

        $a = sin($deltaLat / 2) ** 2
            + cos($fromLat) * cos($toLat) * sin($deltaLng / 2) ** 2;

        return 2 * $earthRadiusKm * asin(min(1, sqrt($a)));
    }
}