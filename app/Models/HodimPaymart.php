<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HodimPaymart extends Model{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'group_id',
        'amount',
        'type',
        'description',
        'admin_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
