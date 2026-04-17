<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Eslatma extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'message', 
        'status', 
        'admin_id',
    ];
    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
