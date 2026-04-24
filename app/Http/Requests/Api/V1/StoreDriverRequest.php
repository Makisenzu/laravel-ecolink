<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDriverRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'licence_number' => ['required', 'string', 'max:255', 'unique:drivers,licence_number'],
            'status' => ['sometimes', 'string', Rule::in(['pending', 'active', 'resigned', 'inactive', 'suspended'])],
            'employment_date' => ['required', 'date'],
        ];
    }
}
