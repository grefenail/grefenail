<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'category' => 'required|exists:categories,id',
            'description' => 'required|string',
            'pet_name' => 'nullable|string|max:100',
            'pet_age' => 'nullable|integer|min:0',
            'pet_size' => 'nullable|exists:pet_sizes,id',
            'pet_gender' => 'nullable|exists:pet_genders,id',
        ];
    }
    
    
}
