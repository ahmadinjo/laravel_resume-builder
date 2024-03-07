<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
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
            'course' => ['required', 'string'],
            'school' => ['required', 'string'],
            'grade' => ['nullable', 'string'],
            'qualification' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'current' => ['nullable', 'required_if:end_date,null', 'boolean'],
            'end_date' => ['nullable', 'date', 'before_or_equal:today', 'after:start_date'],
            'start_date' => ['required', 'date', "before_or_equal:today"],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'field.rule' => 'A title is required',
            'school.required' => 'School field is required',
            'current.boolean' => ':attribute is :input',
            // 'current.required_if' => ':attribute is :input',
            // 'end_date.before_or_equal' => ':attribute is :input',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'course' => 'course of study',
        ];
    }
}
