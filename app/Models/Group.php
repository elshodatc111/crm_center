<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model{
    use HasFactory;
    protected $fillable = [
        'cours_id', 
        'setting_rooms_id', 
        'techer_id', 
        'group_name', 
        'price', 
        'setting_paymarts', 
        'weekday', 
        'lessen_count', 
        'lessen_start', 
        'lessen_end', 
        'lessen_times_id', 
        'user_id',
        'next',
    ];
    public function course(){
        return $this->belongsTo(Cours::class, 'cours_id');
    }
    public function settingRoom(){
        return $this->belongsTo(SettingRooms::class, 'setting_rooms_id');
    }
    public function teacher(){
        return $this->belongsTo(User::class, 'techer_id')->where('type', 'techer');
    }
    public function settingPaymart(){
        return $this->belongsTo(SettingPaymart::class, 'setting_paymarts');
    }
    public function lessenTime(){
        return $this->belongsTo(LessenTime::class, 'lessen_times_id');
    }
    public function admin(){
        return $this->belongsTo(User::class, 'user_id')->whereIn('type', ['admin', 'sAdmin', 'meneger']);
    }
}
