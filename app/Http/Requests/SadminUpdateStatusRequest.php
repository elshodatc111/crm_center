<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SadminUpdateStatusRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->type === 'sAdmin';
    }
    public function rules(): array{
        return [
            'status' => 'required|in:true,false',
        ];
    }
}
