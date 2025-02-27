<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupNextStoreRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }

    public function rules(): array{
        return [
            'group_ids' => 'required',
            'group_name' => 'required|string|max:255',
            'cours_id' => 'required|integer|exists:cours,id',
            'lessen_count' => 'required|integer|min:9|max:31',
            'setting_rooms_id' => 'nullable|integer|exists:setting_rooms,id',
            'lessen_start' => 'required|date',
            'weekday' => 'required|string|in:tok_kun,juft_kun,har_kun',
            'lessen_times_id' => 'nullable|integer|exists:lessen_times,id',
            'setting_paymarts' => 'nullable|integer|exists:setting_paymarts,id',
            'techer_id' => 'required|integer|exists:users,id',
            'techer_bonus' => 'required|numeric|min:0',
            'techer_paymart' => 'required|numeric|min:0',
            'students' => 'nullable|array',
            'students.*' => 'integer|exists:users,id',
        ];
    }
    public function messages(): array{
        return [
            'group_name.required' => 'Guruh nomi majburiy.',
            'cours_id.required' => 'Kursni tanlang.',
            'lessen_count.required' => 'Darslar sonini kiriting.',
            'lessen_start.required' => 'Boshlanish sanasini kiriting.',
            'weekday.required' => 'Guruh turini tanlang.',
            'techer_id.required' => 'O‘qituvchini tanlang.',
            'techer_bonus.required' => 'O‘qituvchi bonusi majburiy.',
            'techer_paymart.required' => 'O‘qituvchiga to‘lov majburiy.',
            'students.*.exists' => 'Noto‘g‘ri talabani tanladingiz.',
        ];
    }
}
