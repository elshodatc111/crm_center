<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Davomad extends Model
{
    use HasFactory;
    protected $table = 'davomads';

    protected $fillable = [
        'user_id',
        'group_id',
        'data',
        'status'
    ];

    protected $casts = [
        'data' => 'date',
        'status' => 'boolean'
    ];
}
