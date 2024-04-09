<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCleanUpRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'location'=> 'required|string|min:2|max:150',
            'time'=> 'required|date_format:H:i', // Use the date_format rule
            'date'=> 'required|date',
            'description'=> 'required|string|min:2|max:150',
            'group_id' => 'required|exists:groups,id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'location.required' => 'The location field is required.',
            'time.required' => 'The time field is required.',
            // Add more custom messages...
        ];
    }
}