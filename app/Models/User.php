<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable{
    use HasFactory, Notifiable,HasApiTokens;

    protected $fillable = [
        'user_name',
        'phone1',
        'phone2',
        'address',
        'birthday',
        'about',
        'group_count',
        'email',
        'type',
        'status',
        'balans',
        'password',
    ];
 
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function isMineger(): bool{
        return in_array($this->type, ['admin', 'sAdmin','meneger']);
    }

    public function isAdmin(): bool{
        return in_array($this->type, ['admin', 'sAdmin']);
    }

    public function isSuperAdmin(): bool{
        return $this->type === 'sAdmin';
    }
}
