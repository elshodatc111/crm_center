<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefundRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }
    public function rules(): array{
        return [
            'user_id' => 'required|integer|exists:users,id',
            'kassa_amount_naqt' => 'required|string',
            'kassa_amount_plastik' => 'required|string',
            'paymart_type' => 'required|string',
            'amount' => 'required|string',
            'description' => 'required|string|max:200',
        ];
    }
    public function messages(){
        return [
            'user_id.required' => 'Foydalanuvchi ID talab qilinadi.',
            'user_id.exists' => 'Foydalanuvchi topilmadi.',
            'kassa_amount.required' => 'Kassadagi summa talab qilinadi.',
            'amount.required' => 'Qaytariladigan summa talab qilinadi.',
            'description.required' => 'Qaytariladigan to‘lov haqida ma’lumot talab qilinadi.',
            'description.max' => 'Qaytariladigan to‘lov haqida ma’lumot 200 ta belgidan oshmasligi kerak.',
        ];
    }
}
