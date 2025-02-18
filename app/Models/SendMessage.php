<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMessage extends Model
{
    use HasFactory;

    protected $table = 'send_messages'; 

    protected $fillable = [
        'phone',
        'message',
        'user_id'
    ];
}
