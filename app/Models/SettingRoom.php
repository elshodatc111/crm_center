<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SettingRoom extends Model{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'user_id',
        'status',
    ];
}
