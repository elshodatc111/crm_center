<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HodimCreateRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }
    public function rules(): array{
        return [
            'user_name' => 'required|string|max:255',
            'phone1' => ['required', 'string', 'regex:/^\+998 \d{2} \d{3} \d{4}$/'],
            'phone2' => ['required', 'string', 'regex:/^\+998 \d{2} \d{3} \d{4}$/'],
            'birthday' => 'required|date',
            'address_id' => 'nullable|integer|exists:socials,id',
            'type' => 'required|string|in:admin,meneger',
            'about' => 'required|string|max:1000',
        ];
    }
    public function messages(): array{
        return [
            'user_name.required' => "Hodim FIO kiritilishi shart!",
            'phone1.required' => "Birinchi telefon raqam kiritilishi shart!",
            'phone1.regex' => "Telefon raqam formati noto'g'ri! (+998 99 999 9999)",
            'phone2.required' => "Ikkinchi telefon raqam kiritilishi shart!",
            'phone2.regex' => "Telefon raqam formati noto'g'ri! (+998 99 999 9999)",
            'birthday.required' => "Tug'ilgan sana kiritilishi shart!",
            'birthday.date' => "Tug'ilgan sana noto'g'ri formatda!",
            'address_id.integer' => "Yashash manzilini tanlang!",
            'address_id.exists' => "Bunday manzil mavjud emas!",
            'type.required' => "Lavozim tanlanishi shart!",
            'type.in' => "Lavozim faqat admin yoki meneger bo'lishi mumkin!",
            'about.required' => "Hodim haqida ma'lumot kiritilishi shart!",
        ];
    }
}
