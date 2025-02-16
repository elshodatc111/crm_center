<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTestRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array{
        return [
            'cours_id' => 'required|numeric|min:0',
            'test' => 'nullable|string|max:255',
            'javob_true' => 'nullable|string|max:255',
            'javob_false_first' => 'nullable|string|max:255',
            'javob_false_two' => 'nullable|string|max:255',
            'javob_false_thre' => 'nullable|string|max:255',
        ];
    }
}
