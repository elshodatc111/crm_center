<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'cours_id',
        'test',
        'javob_true',
        'javob_false_first',
        'javob_false_two',
        'javob_false_thre',
        'user_id',
    ];
}
