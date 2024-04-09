<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCleanUpRequest extends FormRequest
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
            'time'=> 'required|date_format:H:i',
            'date'=> 'required|date',
            'description'=> 'required|string|min:2|max:150',
            'group_id' => 'required|exists:groups,id',
        ];
    }
}
