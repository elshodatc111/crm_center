<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoursAudioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Hammani ruxsat beramiz (agar kerak bo'lsa, tekshirish qo'shish mumkin)
    }

    public function rules(): array
    {
        return [
            'cours_id'      => 'required|exists:cours,id',
            'audio_name'    => 'required|string|max:255',
            'audio_number'  => 'required|integer|min:1',
            'audio_url'     => 'required|string|max:500',
        ];
    }
}
