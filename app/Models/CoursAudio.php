<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class CoursAudio extends Model
{
    use HasFactory;
    protected $table = 'cours_audios';
    protected $fillable = [
        'cours_id',
        'audio_name',
        'audio_number',
        'audio_url',
    ];

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }
}
