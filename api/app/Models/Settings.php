<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'smtp_host',
        'smtp_port',
        'email',
        'password',
        'email',
        'smtp_encryption',
    ];

    protected $hidden = ['password'];
}
