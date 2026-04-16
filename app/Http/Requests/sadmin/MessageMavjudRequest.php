<?php

namespace App\Http\Requests\sadmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MessageMavjudRequest extends FormRequest{
    public function authorize(): bool{
        return Auth::user()->type === 'sAdmin';
    }
    public function rules(): array{
        return [
            'message_mavjud' => 'required|integer|min:1',
        ];
    }
}
