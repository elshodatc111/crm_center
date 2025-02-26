<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest{

    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    } 
    
    public function rules(): array{
        return [
            'naqt' => ['required'],
            'plastik' => ['required'],
            'exson' => ['required'],
            'amount' => ['required', 'regex:/^\d+(\s\d{3})*$/'],
            'type' => ['required', 'in:naqt,plastik,exson'],
            'discription' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(){
        return [
            'amount.required' => 'Chiqim summasini kiriting.',
            'amount.regex' => 'Chiqim summasini faqat raqamlarda kiriting.',
            'type.required' => 'Chiqim turini tanlang.',
            'type.in' => 'Noto‘g‘ri chiqim turi tanlandi.',
            'discription.required' => 'Chiqim haqida ma’lumot kiriting.',
            'discription.max' => 'Chiqim haqida ma’lumot juda uzun.',
        ];
    }
}
