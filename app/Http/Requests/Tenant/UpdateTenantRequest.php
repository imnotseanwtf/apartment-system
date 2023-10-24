<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTenantRequest extends FormRequest
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
            'occupation' => ['required', 'string', 'max:255'],
            'number' => ['required', 'numeric', 'unique:tenants,number,'. $this->tenant->id],
            'email' => ['required', 'email', 'max:255', 'unique:tenants,number,'. $this->tenant->id],
            'picture' => ['nullable', 'mimes:jpeg,bmp,png'],
        ];
    }
}
