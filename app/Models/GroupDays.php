<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupDays extends Model{
    use HasFactory;
    protected $fillable = [
        'group_id',
        'room_id',
        'date',
        'lessen_times_id',
    ];
    public function group(){
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function room(){
        return $this->belongsTo(SettingRooms::class, 'room_id');
    }

    public function lessenTime(){
        return $this->belongsTo(LessenTime::class, 'lessen_times_id');
    }
}
