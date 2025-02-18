<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVisitRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }
    public function rules(): array{
        return [
            'user_name' => 'required|string|max:255',
            'phone1' => 'required|string|unique:users,phone1|regex:/^\+998 \d{2} \d{3} \d{4}$/',
            'phone2' => 'nullable|string|regex:/^\+998 \d{2} \d{3} \d{4}$/',
            'address' => 'required|string',
            'about_me' => 'required|string',
            'birthday' => 'required|date|before:'.now()->subYears(12)->toDateString(), 
            'about' => 'nullable|string|max:500',
        ];
    }
    public function messages(){
        return [
            'phone1.unique' => 'Bu telefon raqami mavjud!',
            'birthday.before' => 'Siz 12 yoshdan kichik bo\'lolmaysiz!',
            'phone1.regex' => 'Telefon raqamni to\'g\'ri formatda kiriting (+998 90 999 9999)',
            'phone2.regex' => 'Telefon raqamni to\'g\'ri formatda kiriting (+998 90 999 9999)',
        ];
    }
}
