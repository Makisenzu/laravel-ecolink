<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RedeemableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Category' => $this->redeemableCategory->category_name,
            'Item Name' => $this->item_name,
            'Description' => $this->description,
            'Points Required' => $this->points_required,
            'Stock' => $this->stock,
            'Status' => $this->status
        ];
    }
}
