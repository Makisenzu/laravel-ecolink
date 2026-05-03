<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            'User ULID' => $this->resident->user->ulid,
            'Category' => $this->reviewCategory->category_name,
            'Content' => $this->content,
            'Suggestion' => $this->suggestion,
            'rating' => $this->rating,
            'status' => $this->status,
            'is_anonymous' => $this->is_anonymous,
            'moderation_flag' => $this->moderation_flag,
            'moderation_score' => $this->moderation_score,
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
