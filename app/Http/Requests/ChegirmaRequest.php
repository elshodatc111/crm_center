<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChegirmaRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array{
        return [
            'user_id'   => 'required|exists:users,id',
            'guruh_id'  => 'required|exists:groups,id',
            'chegirma'  => 'required|string|min:0',
            'description' => 'required|string|max:255',
        ];
    }
    public function messages(){
        return [
            'user_id.required'   => 'Foydalanuvchi ID si kerak!',
            'user_id.exists'     => 'Bunday foydalanuvchi topilmadi!',
            'guruh_id.required'  => 'Guruhni tanlang!',
            'guruh_id.exists'    => 'Tanlangan guruh mavjud emas!',
            'chegirma.required'  => 'Chegirma summasi kerak!',
            'chegirma.min'       => 'Chegirma manfiy bo‘lishi mumkin emas!',
            'description.required' => 'Chegirma haqida ma’lumot kiriting!',
            'description.string'   => 'Chegirma matn shaklida bo‘lishi kerak!',
            'description.max'      => 'Chegirma haqida ma’lumot 255 belgidan oshmasligi kerak!',
        ];
    }
}
