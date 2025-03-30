<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadUser extends Model
{
    protected $table = 'upload_users';

    protected $fillable = [
        'file_name',
        'admin',
        'commint',
        'status',
    ];
}
