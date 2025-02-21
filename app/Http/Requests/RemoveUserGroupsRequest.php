<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemoveUserGroupsRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }
    public function rules(): array{
        return [
            'group_id'   => ['required', 'exists:groups,id'],
            'user_id'    => ['required', 'exists:users,id'],
            'jarima'     => ['required', 'string'],
            'description'=> ['required', 'string', 'max:500'],
        ];
    }
    public function messages(): array{
        return [
            'group_id.required'   => 'Guruh ID majburiy.',
            'group_id.exists'     => 'Noto‘g‘ri guruh tanlandi.',
            'user_id.required'    => 'O‘chiriladigan foydalanuvchini tanlang.',
            'user_id.exists'      => 'Noto‘g‘ri foydalanuvchi tanlandi.',
            'jarima.required'     => 'Jarima summasi majburiy.',
            'jarima.numeric'      => 'Jarima raqam bo‘lishi kerak.',
            'jarima.min'          => 'Jarima kamida 0 bo‘lishi kerak.',
            'description.required'=> 'Sababni yozish majburiy.',
            'description.string'  => 'Sabab matn bo‘lishi kerak.',
            'description.max'     => 'Sabab uzunligi 500 ta belgidan oshmasligi kerak.',
        ];
    }
}
