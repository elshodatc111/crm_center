<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class RefundStatus extends Model{
    use HasFactory;
    protected $fillable = [
        'paymart_id',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
