<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHududRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:socials,name',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Hudud nomi kiritilishi shart.',
            'name.string' => 'Hudud nomi faqat matn bo‘lishi kerak.',
            'name.max' => 'Hudud nomi 255 ta belgidan oshmasligi kerak.',
            'name.unique' => 'Bunday nomdagi hudud allaqachon mavjud.',
        ];
    }
}
