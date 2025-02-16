<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursVideo extends Model{
    use HasFactory;

    protected $fillable = [
        'cours_id',
        'cours_name',
        'lessen_number',
        'video_url',
        'user_id',
    ];
}
