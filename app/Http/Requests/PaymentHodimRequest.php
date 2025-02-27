<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentHodimRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }
    
    public function rules(): array{
        return [
            'user_id' => 'required|exists:users,id',
            'naqt' => 'required|string',
            'plastik' => 'required|string',
            'amount' => 'required|string',
            'type' => 'required|in:naqt,plastik',
            'discription' => 'required|string|max:255',
        ];
    }
    public function messages(): array{
        return [
            'user_id.required' => 'Foydalanuvchi tanlanishi shart.',
            'user_id.exists' => 'Bunday foydalanuvchi mavjud emas.',
            'amount.required' => 'To‘lov summasi kiritilishi shart.',
            'type.required' => 'To‘lov turi tanlanishi shart.',
            'type.in' => 'To‘lov turi faqat naqt yoki plastik bo‘lishi mumkin.',
            'discription.required' => 'To‘lov haqida ma’lumot kiritilishi shart.',
            'discription.string' => 'To‘lov haqida faqat matn kiritilishi mumkin.',
        ];
    }
}
