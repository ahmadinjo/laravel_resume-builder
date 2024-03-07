<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreResumeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->resume_name),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo' => ['nullable', 'image', 'dimensions:min_width=100,min_height=100,max_width=1080,max_height=1080,ratio=1', 'max:512'],
            'resume_name' => ['required', 'string', 'unique:resumes'],
            'slug' => ['required', 'string', 'unique:resumes'],
            'fullname' => ['required', 'string',],
            'email' => ['required', 'string', 'lowercase', 'email'],
            'phone_no' => ['required', 'numeric'],
            'address' => ['required', 'string',],
            'summary' => ['nullable', 'string',],
            'skills' => ['required', 'string',],
            'work_experiences' => ['nullable', 'string',],
            'projects' => ['nullable', 'string',],
            'education' => ['nullable', 'string',],
            'references' => ['nullable', 'string',],
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
            'slug.unique' => 'Resume name is already in use',
        ];
    }
}
