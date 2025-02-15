<?php

namespace App\Http\Requests\sadmin;

use Illuminate\Foundation\Http\FormRequest;

class MessageStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->type === 'sAdmin';
    }
    public function rules(): array
    {
        return [
            'status' => 'required|boolean',
        ];
    }
}
