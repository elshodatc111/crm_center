<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVideoRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }
    public function rules(): array{
        return [
            'cours_id' => 'required|numeric|min:0',
            'cours_name' => 'nullable|string|max:255',
            'lessen_number' => 'required|numeric|min:0',
            'video_url' => 'nullable|string|max:255',
        ];
    }
}
