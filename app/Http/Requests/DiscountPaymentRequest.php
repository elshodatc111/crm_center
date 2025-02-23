<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountPaymentRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }

    public function rules(): array{
        return [
            'user_id'   => 'required|exists:users,id',
            'amount'    => 'required|numeric',
            'chegirma'  => 'required|numeric',
            'type'      => 'required|in:naqt,plastik',
            'discription' => 'nullable|string|max:255',
        ];
    }
    public function messages(){
        return [
            'user_id.required'   => 'Foydalanuvchi ID talab qilinadi.',
            'user_id.exists'     => 'Foydalanuvchi topilmadi.',
            'amount.required'    => 'To‘lov summasi majburiy.',
            'amount.numeric'     => 'To‘lov summasi faqat raqamlardan iborat bo‘lishi kerak.',
            'chegirma.required'  => 'Chegirma summasi majburiy.',
            'chegirma.numeric'   => 'Chegirma faqat raqamlardan iborat bo‘lishi kerak.',
            'type.required'      => 'To‘lov turi tanlanishi shart.',
            'type.in'            => 'To‘lov turi noto‘g‘ri.',
            'discription.max'    => 'To‘lov haqida ma’lumot 255 belgidan oshmasligi kerak.',
        ];
    }
}
