<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHolidayAddRequest extends FormRequest{
    public function authorize(): bool{
        return true; // foydalanuvchi ruxsati kerak bo‘lsa, shu yerda tekshirishingiz mumkin
    }

    public function rules(): array{
        return [
            'date' => 'required|date|unique:holidays,date',
            'comment' => 'required|string|max:255',
        ];
    }

    public function messages(): array{
        return [
            'date.required' => 'Sanani kiriting.',
            'date.unique' => 'Bu sana allaqachon kiritilgan.',
            'comment.required' => 'Izohni kiriting.',
        ];
    }
}
