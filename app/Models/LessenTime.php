<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessenTime extends Model
{
    use HasFactory;

    protected $table = 'lessen_times'; 

    protected $fillable = ['number', 'time']; 

    public function setTimeAttribute($value)
    {
        if (preg_match('/^\d{2}:\d{2} - \d{2}:\d{2}$/', $value)) {
            $this->attributes['time'] = $value;
        } else {
            throw new \InvalidArgumentException('Noto‘g‘ri vaqt formati. To‘g‘ri format: MM:SS - MM:SS');
        }
    }

    public function getTimeAttribute($value)
    {
        return $value;
    }
}
