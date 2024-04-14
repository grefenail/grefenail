<?php

namespace App\Http\Requests;

use App\Models\Location;
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
            'petName' => 'nullable|string|max:100',
            'ownerName' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:200',
            'email' => 'nullable|email',
            'petAge' => 'nullable|integer|min:0',
            'contact' => 'nullable|string|max:20',
            'image' => 'required|image', 
        ];
    }
    

    protected function prepareForValidation(): void
    {
        $location = Location::where('code', $this->location)->first()?->id;

        $this->merge(['location' => $location]);
    }

}
