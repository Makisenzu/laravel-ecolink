<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRedeemableRequest extends FormRequest
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
            'redeemable_category_id' => 'required|exists:redeemable_categories,id',
            'item_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'points_required' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'is_active' => 'required|boolean'
        ];
    }
}
