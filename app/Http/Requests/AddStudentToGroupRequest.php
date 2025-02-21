<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStudentToGroupRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }

    public function rules(): array{
        return [
            'user_id' => ['required', 'exists:users,id'], 
            'group_id' => ['required', 'exists:groups,id'], 
            'start_discription' => ['required', 'string', 'min:5', 'max:500'],
        ];
    }

    public function messages(): array{
        return [
            'user_id.required' => 'Foydalanuvchi ID si kiritilishi kerak!',
            'user_id.exists' => 'Bunday foydalanuvchi mavjud emas!',
            'group_id.required' => 'Guruhni tanlashingiz kerak!',
            'group_id.exists' => 'Bunday guruh mavjud emas!',
            'start_discription.required' => 'Izoh kiritilishi kerak!',
            'start_discription.string' => 'Izoh faqat matn shaklida bo‘lishi kerak!',
            'start_discription.min' => 'Izoh kamida 5 ta belgidan iborat bo‘lishi kerak!',
            'start_discription.max' => 'Izoh eng ko‘pi bilan 500 ta belgidan iborat bo‘lishi kerak!',
        ];
    }
}
