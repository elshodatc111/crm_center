<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChiqimRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }
    public function rules(): array{
        return [
            'naqt' => ['required'],
            'plastik' => ['required'],
            'amount' => ['required', 'regex:/^\d+(\s\d{3})*$/'],
            'type' => ['required', 'in:naqt,plastik'], 
            'description' => ['required', 'string', 'max:255'],
        ];
    }
    public function messages(): array{
        return [
            'amount.required' => 'Chiqim summasini kiriting.',
            'amount.regex' => 'Chiqim summasi faqat raqamlar va probellar bilan yozilishi kerak.',
            'type.required' => 'Chiqim turini tanlang.',
            'type.in' => 'Chiqim turi faqat "naqt" yoki "plastik" bo‘lishi mumkin.',
            'description.required' => 'Chiqim haqida ma’lumot kiriting.',
            'description.max' => 'Chiqim haqida ma’lumot 255 belgidan oshmasligi kerak.',
        ];
    }
}
