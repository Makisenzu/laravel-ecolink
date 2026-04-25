<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'barangay_id' => $this->barangay_id,
            'barangay_name' => $this->barangay ? $this->barangay->barangay_name : null,
            'driver_id' => $this->driver_id,
            'driver_name' => trim((($this->driver?->user?->firstname) ?? '') . ' ' . (($this->driver?->user?->lastname) ?? '')) ?: null,
            'collection_date' => $this->collection_date,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
