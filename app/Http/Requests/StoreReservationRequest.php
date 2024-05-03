<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class StoreReservationRequest extends FormRequest
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
            'user_id' => 'required',
            'listing_id' => 'required',
        ];
    }
    

    protected function prepareForValidation(): void
    {
        if($this->startDate && $this->endDate)
        {
            $this->merge(['startDate' => Carbon::createFromFormat("d/m/Y", $this->startDate)->format("Y-m-d")]);
            $this->merge(['endDate' => Carbon::createFromFormat("d/m/Y", $this->endDate)->format("Y-m-d")]);
        }
    }

}
