<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'group_id',
        'start_meneger',
        'start_discription',
        'end_meneger',
        'end_discription',
        'status',
        'jarima_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id')->where('type', 'student');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function startMeneger(){
        return $this->belongsTo(User::class, 'start_meneger')->whereIn('type', ['admin', 'sAdmin', 'meneger']);
    }

    public function endMeneger(){
        return $this->belongsTo(User::class, 'end_meneger')->whereIn('type', ['admin', 'sAdmin', 'meneger']);
    }
}
