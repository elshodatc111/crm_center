<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymartRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }
    public function rules(): array{
        return [
            'user_id' => 'required|exists:users,id',
            'amount_naqt' => 'required|string',
            'amount_plastik' => 'required|string',
            'group_id' => 'nullable',
            'payment_info' => 'required|string|max:255',
        ];
    }
    public function messages(): array{
        return [
            'amount_naqt.required' => 'To‘lov summasi majburiy.',
            'amount_plastik.required' => 'To‘lov summasi majburiy.',
            'payment_info.required' => 'To‘lov haqida ma’lumot kiritish majburiy.',
        ];
    }
}
