<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupUpdateRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }
    public function rules(): array{
        return [
            'id' => 'required',
            'group_name' => 'required|string|max:255',
            'cours_id' => 'required|exists:cours,id',
            'techer_id' => 'required|exists:users,id',
            'techer_paymart' => 'required',
            'techer_bonus' => 'required',
        ];
    }
}
