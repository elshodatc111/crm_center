<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Setting extends Model{
    protected $fillable = [
        'name',
        'status',
        'balans_naqt',
        'balans_plastik',
        'balans_exson',
        'exson_foiz',
        'social_telegram',
        'social_instagram',
        'social_facebook',
        'social_youtube',
        'social_banner',
        'social_tanish',
        'social_boshqa',
        'message_mavjud',
        'message_count',
        'message_status',
        'new_student_sms',
        'new_hodim_sms',
        'group_count',
        'pay_student_sms',
        'pay_hodim_sms',
        'update_pass_sms',
        'birthday_sms',
    ];
}
