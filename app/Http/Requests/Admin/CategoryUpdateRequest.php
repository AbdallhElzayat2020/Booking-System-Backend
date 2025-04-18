<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
        // $categoryId = $this->category;
        $categoryId = $this->route('category');
        return [
            'icon_image' => ['sometimes', 'required', 'image', 'max:3000'],
            'background_image' => ['sometimes', 'required', 'image', 'max:3000'],
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,' . $categoryId],
            'show_at_home' => ['required', 'boolean'],
            'status' => ['required', 'in:active,inactive'],
        ];
    }
}
