<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingChegirma extends Model{
    use HasFactory;
    protected $table = 'setting_chegirmas';
    protected $fillable = [
        'amount',
        'chegirma',
        'comment',
        'status',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
