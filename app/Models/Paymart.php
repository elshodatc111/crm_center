<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Group;

class Paymart extends Model
{
    use HasFactory;

    protected $table = 'paymarts';

    protected $fillable = [
        'user_id',
        'group_id',
        'amount',
        'paymart_type',
        'description',
        'admin_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
