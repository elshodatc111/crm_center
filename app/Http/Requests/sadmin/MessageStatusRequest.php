<?php

namespace App\Http\Requests\sadmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MessageStatusRequest extends FormRequest{

    public function authorize(): bool{
        return Auth::user()->type === 'sAdmin';
    }

    public function rules(): array{
        return [
            'status' => 'required|boolean',
        ];
    }

}
