<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }
    public function rules(): array{
        return [
            'group_name' => 'required|string|max:255',
            'cours_id' => 'required|exists:cours,id',
            'lessen_count' => 'required|integer|min:9|max:31',
            'setting_rooms_id' => 'required|exists:setting_rooms,id',
            'lessen_start' => 'required|date|after_or_equal:yesterday',
            'weekday' => 'required|in:tok_kun,juft_kun,har_kun',
            'lessen_times_id' => 'required|exists:lessen_times,id',
            'setting_paymarts' => 'required|exists:setting_paymarts,id',
            'techer_id' => 'required|exists:users,id',
            'techer_bonus' => 'required|string|min:0',
            'techer_paymart' => 'required|string|min:0',
        ];
    }
    public function messages(): array{
        return [
            'group_name.required' => 'Guruh nomi majburiy.',
            'cours_id.required' => 'Kurs tanlash shart.',
            'cours_id.exists' => 'Tanlangan kurs mavjud emas.',
            'lessen_count.required' => 'Darslar soni majburiy.',
            'lessen_count.integer' => 'Darslar soni butun son bo‘lishi kerak.',
            'lessen_count.min' => 'Darslar soni kamida 9 bo‘lishi kerak.',
            'lessen_count.max' => 'Darslar soni 31 dan oshmasligi kerak.',
            'setting_rooms_id.required' => 'Dars xonasi tanlanishi kerak.',
            'setting_rooms_id.exists' => 'Tanlangan xona mavjud emas.',
            'lessen_start.required' => 'Boshlanish sanasi majburiy.',
            'lessen_start.date' => 'Sanani to‘g‘ri formatda kiriting.',
            'lessen_start.after_or_equal' => 'Sanani kecha yoki bugundan boshlab tanlash mumkin.',
            'weekday.required' => 'Guruh turi tanlanishi kerak.',
            'weekday.in' => 'Faqat toq kunlar, juft kunlar yoki har kuni variantlari mavjud.',
            'lessen_times_id.required' => 'Dars vaqti tanlanishi kerak.',
            'lessen_times_id.exists' => 'Tanlangan dars vaqti mavjud emas.',
            'setting_paymarts.required' => 'To‘lov summasi tanlanishi kerak.',
            'setting_paymarts.exists' => 'Tanlangan to‘lov turi mavjud emas.',
            'techer_id.required' => 'O‘qituvchi tanlanishi kerak.',
            'techer_id.exists' => 'Tanlangan o‘qituvchi mavjud emas.',
            'techer_bonus.required' => 'O‘qituvchiga bonus miqdorini kiriting.',
            'techer_bonus.numeric' => 'Bonus miqdori faqat son bo‘lishi kerak.',
            'techer_bonus.min' => 'Bonus 0 dan kam bo‘lishi mumkin emas.',
            'techer_paymart.required' => 'O‘qituvchiga to‘lov miqdorini kiriting.',
            'techer_paymart.numeric' => 'To‘lov miqdori faqat son bo‘lishi kerak.',
            'techer_paymart.min' => 'To‘lov 0 dan kam bo‘lishi mumkin emas.',
        ];
    }
}
