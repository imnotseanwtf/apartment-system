<?php

namespace App\Http\Requests\Apartment;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
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
            'name'=> ['required', 'string'],
            'address' => ['required'] ,
            'base_price' => ['required', 'numeric'],
            'description' => ['required', 'string', 'max:255'],
            'security_deposit' => ['required', 'numeric'],
            'picture' => ['required', 'mimes:jpeg,bmp,png'],
        ];
    }
}
