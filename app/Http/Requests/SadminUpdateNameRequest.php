<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SadminUpdateNameRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->type === 'sAdmin';
    }
    public function rules(): array{
        return [
            'name' => 'required|string|min:3|max:255',
        ];
    }
}
