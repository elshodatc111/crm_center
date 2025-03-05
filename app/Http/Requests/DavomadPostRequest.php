<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DavomadPostRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }
    
    public function rules(): array{
        return [
            'attendances' => 'required|array',
            'attendances.*.user_id' => 'required|exists:users,id',
            'attendances.*.group_id' => 'required|exists:groups,id',
            'attendances.*.status' => 'required|in:true,false,1,0',
        ];
    }

    public function messages(){
        return [
            'attendances.required' => 'Davomad ma\'lumotlarini kiritish majburiy.',
            'attendances.array' => 'Davomadlar massiv bo\'lishi kerak.',
            'attendances.*.user_id.required' => 'Har bir talabaga user_id kiritish majburiy.',
            'attendances.*.user_id.exists' => 'User ID mavjud emas.',
            'attendances.*.group_id.required' => 'Har bir talabaga group_id kiritish majburiy.',
            'attendances.*.group_id.exists' => 'Group ID mavjud emas.',
            'attendances.*.status.required' => 'Status maydoni majburiy.',
            'attendances.*.status.boolean' => 'Status faqat true yoki false bo‘lishi kerak.',
        ];
    }
}
