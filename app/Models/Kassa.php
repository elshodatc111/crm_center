<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kassa extends Model{
    use HasFactory;

    protected $table = 'kassas';

    protected $fillable = [
        'naqt',
        'naqt_xar_pedding',
        'naqt_chiq_pedding',
        'naqt_qayt_pedding',
        'plastik',
        'plastik_xar_pedding',
        'plastik_chiq_pedding',
        'plastik_qayt_pedding',
    ];
}
