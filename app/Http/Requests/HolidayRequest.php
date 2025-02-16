<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HolidayRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }
    public function rules(): array{
        return [
            'date' => 'required|date_format:Y-m-d',
            'comment' => 'nullable|string|max:255',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
