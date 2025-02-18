<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model{
    use HasFactory;

    protected $table = 'user_histories';

    protected $fillable = [
        'user_id', 'type', 'type_commit', 'admin_id'
    ];

    protected $casts = [
        'type' => 'string'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
