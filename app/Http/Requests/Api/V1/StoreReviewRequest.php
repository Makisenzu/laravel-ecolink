<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'is_anonymous' => 'required|boolean',
            'resident_id' => 'required_if:is_anonymous,false|nullable|exists:residents,id',
            'purok_id' => 'required|exists:puroks,id',
            'review_category_id' => 'required|exists:review_categories,id',
            'content' => 'required|string|max:1000',
            'rating' => 'required|numeric|min:1|max:5',
            'fullname' => 'nullable|string|max:255',
            'suggestion' => 'nullable|string|max:1000',
            'status' => 'nullable|string|in:pending,approved,rejected',
        ];
    }
}
