<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRoleRequest extends FormRequest
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
            'description' => 'nullable|string|max:255',
            'status' => 'nullable|integer|in:1,2',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'name.string' => 'A name must be a string',
            'name.max' => 'A name must be less than 255 characters',
            'description.string' => 'A description must be a string',
            'description.max' => 'A description must be less than 255 characters',
            'status.integer' => 'A status must be an integer',
            'status.in' => 'A status must be either 1 or 2',
        ];
    }
}
