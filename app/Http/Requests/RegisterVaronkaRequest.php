<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterVaronkaRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }

    public function rules(): array{
        return [
            'id' => ['required', 'integer', 'exists:varonkas,id'], 
            'about' => ['required', 'string', 'max:250'],
        ];
    }

    public function messages(): array{
        return [
            'about.required' => "Iltimos, 'Ro'yhatga olish haqida' maydonini to‘ldiring.",
            'about.string' => "Matn kiritish kerak.",
            'about.max' => "Matn uzunligi 250 ta belgidan oshmasligi kerak.",
        ];
    }
}
