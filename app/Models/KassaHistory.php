<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class KassaHistory extends Model
{
    use HasFactory;

    protected $table = 'kassa_histories';

    protected $fillable = [
        'meneger_id',
        'create_time',
        'description',
        'amount',
        'type',
        'status',
        'admin_id',
        'succes_time'
    ];

    public $timestamps = false;

    const STATUS_NAQT_CHIQ = 'naqt_chiq';
    const STATUS_NAQT_XAR = 'naqt_xar';
    const STATUS_PLASTIK_CHIQ = 'plastik_chiq';
    const STATUS_PLASTIK_XAR = 'plastik_xar';
    
    public static function getStatuses(){
        return [
            self::STATUS_NAQT_CHIQ => 'Naqt chiqim',
            self::STATUS_NAQT_XAR => 'Naqt xarajat',
            self::STATUS_PLASTIK_CHIQ => 'Plastik chiqim',
            self::STATUS_PLASTIK_XAR => 'Plastik xarajat',
        ];
    }

    public function manager(){
        return $this->belongsTo(User::class, 'meneger_id');
    }
    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
