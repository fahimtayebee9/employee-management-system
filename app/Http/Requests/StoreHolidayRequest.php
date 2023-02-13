<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHolidayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',    
            'date' => 'required|date',    
            'description' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required for the holiday.',
            'name.string' => 'The holiday name must be a string.',
            'name.max' => 'The holiday name must be less than 255 characters.',
            'date.required' => 'A date is required for the holiday.',
            'date.date' => 'The date must be a valid date format (YYYY-MM-DD).',
            'description.required' => 'A description is required for the holiday.',
            'description.string' => 'The holiday description must be a string.',
        ];
    }
}
