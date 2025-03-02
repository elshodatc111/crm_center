<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Varonka extends Model
{
    use HasFactory;

    protected $table = 'varonkas';

    protected $fillable = [
        'user_name', 'phone1', 'phone2', 'address', 'birthday',
        'status', 'register_id', 'type_social'
    ];

    public function history()
    {
        return $this->hasMany(VaronkaHistory::class, 'varonka_id');
    }
}
