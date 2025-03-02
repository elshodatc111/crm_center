<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaronkaHistory extends Model
{
    use HasFactory;

    protected $table = 'varonka_histories';

    protected $fillable = [
        'varonka_id', 'comment', 'admin_id'
    ];

    public function varonka()
    {
        return $this->belongsTo(Varonka::class, 'varonka_id');
    }
}
