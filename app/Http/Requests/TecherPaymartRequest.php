<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TecherPaymartRequest extends FormRequest{
    
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }
    public function rules(): array{
        return [
            'naqt' => ['nullable', 'string', 'min:0'],
            'plastik' => ['nullable', 'string', 'min:0'],
            'techer_id' => ['required', 'integer', 'exists:users,id'],
            'group_id' => ['required', 'integer', 'exists:groups,id'],
            'amount' => ['required', 'string'], // Kamida 1000 so'm
            'type' => ['required', 'in:naqt,plastik'],
            'description' => ['required', 'string', 'max:255'],
        ];
    }
    public function messages(): array{
        return [
            'group_id.required' => 'Guruhni tanlang!',
            'amount.required' => 'To‘lov summasini kiriting!',
            'type.required' => 'To‘lov turini tanlang!',
            'description.required' => 'To‘lov haqida ma’lumot kiriting!',
        ];
    }
}
