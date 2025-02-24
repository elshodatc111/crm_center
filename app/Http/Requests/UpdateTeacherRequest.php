<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }
    public function rules(): array{
        return [
            'techer_id' => 'required|exists:users,id',
            'user_name' => 'required|string|max:255',
            'phone1' => 'required|string|min:9|max:16',
            'phone2' => 'nullable|string|min:9|max:16',
            'birthday' => 'required|date',
            'address' => 'required|string|max:500',
        ];
    }
}
