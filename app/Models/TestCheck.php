<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class TestCheck extends Model
{
    use HasFactory;

    protected $table = 'test_checks';

    protected $fillable = [
        'user_id',
        'group_id',
        'count',
        'count_true',
        'ball'
    ];
}
