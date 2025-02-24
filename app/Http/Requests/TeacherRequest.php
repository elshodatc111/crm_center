<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array{
        return [
            'user_name' => 'required|string|max:255',
            'phone1' => ['required', 'string', 'regex:/^\+998 \d{2} \d{3} \d{4}$/'],
            'phone2' => ['required', 'string', 'regex:/^\+998 \d{2} \d{3} \d{4}$/'],
            'birthday' => 'required|date',
            'address_id' => 'required|exists:socials,id',
            'about' => 'required|string',
        ];
    }
    public function messages(){
        return [
            'phone1.regex' => 'Telefon raqam +998 99 999 9999 formatida bo‘lishi kerak.',
            'phone2.regex' => 'Telefon raqam +998 99 999 9999 formatida bo‘lishi kerak.',
            'birthday.required' => 'Tug‘ilgan kun majburiy.',
            'address_id.exists' => 'Yaroqli yashash manzilini tanlang.',
        ];
    }
}
