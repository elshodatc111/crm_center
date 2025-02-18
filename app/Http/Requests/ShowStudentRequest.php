<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowStudentRequest extends FormRequest{
    public function authorize(): bool{
        return auth()->check() && auth()->user()->isMineger();
    }
    public function rules(){
        return [
            'id' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->where('type', 'student'),
            ],
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'id' => $this->route('id'),
        ]);
    }
}
