<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenegerChart extends Model{
    use HasFactory;

    protected $table = 'meneger_charts';

    protected $fillable = [
        'user_id',
        'paymart_add_naqt',
        'paymart_add_plastik',
        'chegirma_add',
        'qaytarildi_add',
        'create_group',
        'create_student',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
