<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(){
        return [
            'naqt'   => ['required', 'numeric', 'min:0'],
            'plastik' => ['required', 'numeric', 'min:0'],
            'amount' => ['required', 'string', 'regex:/^\d{1,3}(?:\s\d{3})*$/'],
            'type'   => ['required', 'in:naqt,plastik'],
            'discription' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(){
        return [
            'amount.regex' => 'Summani to‘g‘ri formatda kiriting (masalan: 1 000 000)',
            'type.in' => 'Faqat "naqt" yoki "plastik" tanlash mumkin.',
            'discription.required' => 'Xarajat haqida ma’lumot kiritish shart.',
        ];
    }
}
