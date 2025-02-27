<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HodimUpdateRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }
    public function rules(): array{
        return [
            'user_id'   => 'required|exists:users,id',
            'user_name' => 'required|string|max:255',
            'phone1'    => 'required',
            'phone2'    => 'required',
            'birthday'  => 'required',
            'address'   => 'required|string|max:255',
            'type'      => 'required|in:meneger,admin',
            'about'     => 'required|string|max:500',
        ];
    }
}
