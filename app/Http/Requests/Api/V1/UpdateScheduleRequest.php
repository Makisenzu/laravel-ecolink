<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest
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
            'barangay_id' => 'sometimes|integer|exists:barangays,id',
            'driver_id' => 'sometimes|integer|exists:drivers,id',
            'collection_date' => 'sometimes|date',
            'status' => 'sometimes|string|in:scheduled,completed,cancelled,progressing',
        ];
    }
}
