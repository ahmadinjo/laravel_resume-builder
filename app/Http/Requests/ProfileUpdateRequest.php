<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        // $isAdmin = $this->user()->role === 'admin';
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone_no' => ['nullable', 'numeric'],
            'address' => ['nullable', 'string'],
            'photo' => ['image', 'max:512', Rule::dimensions()->maxWidth(512)->maxHeight(512)->ratio(1)],
            // 'role' => ['string', Rule::excludeIf($isAdmin)]
        ];
    }
}
