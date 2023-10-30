<?php

namespace App\Http\Requests\Unit;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'monthly_rent' => ['required', 'numeric'],
            'security_deposit' => ['required', 'numeric'],
            'advance_electricity' => ['required', 'numeric'],
            'advance_water' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'apartment_id' => ['required', 'exists:apartments,id'],
        ];
    }
}
