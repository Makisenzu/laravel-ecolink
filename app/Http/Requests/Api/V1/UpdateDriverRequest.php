<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDriverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
        * @return array<string, mixed>
     */
    public function rules(): array
    {
        $driverId = $this->route('id') ?? $this->route('driver');

        return [
            'user_id' => ['sometimes', 'integer', 'exists:users,id'],
            'licence_number' => ['sometimes', 'string', 'max:255', Rule::unique('drivers', 'licence_number')->ignore($driverId)],
            'status' => ['sometimes', 'string', Rule::in(['pending', 'active', 'resigned', 'inactive', 'suspended'])],
            'employment_date' => ['sometimes', 'date'],
        ];
    }
}
