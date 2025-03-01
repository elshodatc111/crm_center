<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }
    
    public function rules(): array{
        return [
            'visited' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone1' => 'required|string|regex:/^\+998 \d{2} \d{3} \d{4}$/',
            'phone2' => 'required|string|regex:/^\+998 \d{2} \d{3} \d{4}$/',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
        ];
    }
    
    public function messages(): array{
        return [
            'name.required' => "Ism majburiy.",
            'surname.required' => "Familiya majburiy.",
            'phone1.required' => "Telefon raqami majburiy.",
            'phone2.required' => "Telefon raqami majburiy.",
            'address.required' => "Telefon raqami majburiy.",
            'birth_date.required' => "Telefon raqami majburiy.",
        ];
    }

}
