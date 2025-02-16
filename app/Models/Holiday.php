<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Holiday extends Model{
    use HasFactory;
    protected $fillable = ['date', 'comment', 'user_id'];
    protected $casts = [
        'date' => 'date:Y-m-d',
    ];
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
