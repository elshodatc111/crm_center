<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }
    public function rules(): array{
        return [
            'user_id' => 'required|exists:users,id',
            'user_name' => 'required|string|max:255',
            'phone1' => 'required|string|regex:/^\+998 \d{2} \d{3} \d{4}$/',
            'phone2' => 'nullable|string|regex:/^\+998 \d{2} \d{3} \d{4}$/',
            'birthday' => 'required|date|before:today',
            'address' => 'required|string|max:255',
        ];
    }
    public function messages(): array{
        return [
            'user_id.required' => 'Foydalanuvchi ID-si kerak.',
            'user_id.exists' => 'Bunday ID li foydalanuvchi topilmadi.',
            'user_name.required' => 'FIO majburiy.',
            'phone1.required' => 'Telefon raqam majburiy.',
            'phone1.regex' => 'Telefon raqam +998XXXXXXXXX formatida bo‘lishi kerak.',
            'phone2.regex' => 'Qo‘shimcha telefon raqam +998XXXXXXXXX formatida bo‘lishi kerak.',
            'birthday.required' => 'Tug‘ilgan sana majburiy.',
            'birthday.date' => 'Tug‘ilgan sana noto‘g‘ri formatda.',
            'birthday.before' => 'Tug‘ilgan sana bugungi kundan oldin bo‘lishi kerak.',
            'address.required' => 'Manzil majburiy.',
        ];
    }
}
