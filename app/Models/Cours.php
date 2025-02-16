<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cours extends Model{
    use HasFactory;

    protected $fillable = [
        'cours_name',
        'user_id',
        'status',
    ];
}
