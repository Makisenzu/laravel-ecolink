<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Site ULID' => $this->ulid,
            'purok_id' => $this->purok_id,
            'site_name' => $this->site_name,
            'latitude' => (float) $this->latitude,
            'longitude' => (float) $this->longitude,
            'location_type' => $this->location_type,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}