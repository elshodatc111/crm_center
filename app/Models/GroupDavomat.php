<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupDavomat extends Model{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'user_id',
        'date',
    ];

    public function group(){
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
