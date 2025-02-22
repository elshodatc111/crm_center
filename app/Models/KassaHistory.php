<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class KassaHistory extends Model
{
    use HasFactory;

    protected $table = 'kassa_history';

    protected $fillable = [
        'meneger_id',
        'create_time',
        'description',
        'amount',
        'type',
        'status',
        'admin_id',
        'succes_time',
    ];

    public function meneger()
    {
        return $this->belongsTo(User::class, 'meneger_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
