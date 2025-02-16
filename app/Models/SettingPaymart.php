<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SettingPaymart extends Model{
    use HasFactory;

    protected $fillable = [
        'amount',
        'chegirma',
        'admin_chegirma',
        'user_id',
        'status'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'chegirma' => 'decimal:2',
        'admin_chegirma' => 'decimal:2',
        'status' => 'string'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
