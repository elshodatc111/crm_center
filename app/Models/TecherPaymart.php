<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TecherPaymart extends Model{
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
        return $this->belongsTo(User::class, 'user_id');
    }
    public function group(){
        return $this->belongsTo(Group::class, 'group_id');
    }
    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
