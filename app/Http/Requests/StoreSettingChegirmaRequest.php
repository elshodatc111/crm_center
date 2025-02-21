<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingChegirmaRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isAdmin();
    }
    public function rules(): array{
        return [
            'amount'   => 'required|string|min:1',
            'chegirma' => 'required|string|min:1',
            'comment'  => 'required|string|max:255',
        ];
    }
}
