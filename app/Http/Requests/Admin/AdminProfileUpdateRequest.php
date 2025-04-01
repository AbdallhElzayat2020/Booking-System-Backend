<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileUpdateRequest extends FormRequest
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
            'avatar' => ['nullable', 'image', 'max:3000'],
            'banner' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'max:20'],
            'address' => ['required', 'max:255', 'string'],
            'about' => ['required', 'max:3000', 'string'],

            'website' => ['nullable', 'url'],
            'fb_link' => ['nullable', 'url'],
            'x_link' => ['nullable', 'url'],
            'in_link' => ['nullable', 'url'],
            'wa_link' => ['nullable', 'url'],
            'instra_link' => ['nullable', 'url'],
        ];
    }
}
