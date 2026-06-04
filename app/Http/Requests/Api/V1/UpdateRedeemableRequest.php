<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRedeemableRequest extends FormRequest
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
            'redeemable_category_id' => 'sometimes|exists:redeemable_categories,id',
            'item_name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|max:255',
            'points_required' => 'sometimes|integer|min:0',
            'stock' => 'sometimes|integer|min:0',
            'is_active' => 'sometimes|boolean'
        ];
    }
}
