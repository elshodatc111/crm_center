<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingCreateroomRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }
    public function rules(): array{
        return [
            'room_name' => 'required',
        ];
    }
}
