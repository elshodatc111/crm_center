<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingSmsUpdateRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array{
        return [
            'new_student_sms'  => 'nullable|in:on',
            'new_hodim_sms'    => 'nullable|in:on',
            'pay_student_sms'  => 'nullable|in:on',
            'pay_hodim_sms'    => 'nullable|in:on',
            'update_pass_sms'  => 'nullable|in:on',
            'birthday_sms'     => 'nullable|in:on',
        ];
    }
    public function messages(): array{
        return [
            'in' => "Xatolik: noto‘g‘ri qiymat kiritildi!",
        ];
    }
}
