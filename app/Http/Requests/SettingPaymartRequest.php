<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingPaymartRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array{
        return [
            'amount' => 'required|numeric|min:0',
            'chegirma' => 'nullable|numeric|min:0',
            'admin_chegirma' => 'nullable|numeric|min:0',
        ];
    }
}
