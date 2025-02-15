<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessenTimeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->type === 'sAdmin';
    }
    public function rules(): array
    {
        return [
            'start' => 'required|date_format:H:i',
            'time' => 'required|integer|min:1', 
            'count' => 'required|integer|min:1',
        ];
    }
    public function messages(): array
    {
        return [
            'start.required' => 'Dars boshlanish vaqtini kiriting!',
            'start.date_format' => 'Dars vaqti HH:MM formatida bo‘lishi kerak!',
            'time.required' => 'Dars davomiyligini kiriting!',
            'time.integer' => 'Dars davomiyligi raqam bo‘lishi kerak!',
            'time.min' => 'Dars davomiyligi kamida 1 minut bo‘lishi kerak!',
            'count.required' => 'Darslar sonini kiriting!',
            'count.integer' => 'Darslar soni raqam bo‘lishi kerak!',
            'count.min' => 'Darslar soni kamida 1 bo‘lishi kerak!',
        ];
    }
}
