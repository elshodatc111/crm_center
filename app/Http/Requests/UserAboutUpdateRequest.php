<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAboutUpdateRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }
    public function rules(): array{
        return [
            'id' => 'required',
            'about' => 'nullable|string|max:500',
        ];
    }
}
