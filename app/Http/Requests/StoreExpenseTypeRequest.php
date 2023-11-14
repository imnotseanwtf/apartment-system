<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseTypeRequest extends FormRequest
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
            'bills' => ['required', 'string', 'max:255'],
            'lived_in_id' => ['required', 'exists:lived_ins,id'],
            'price' => ['required', 'numeric'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable']
        ];
    }
}
