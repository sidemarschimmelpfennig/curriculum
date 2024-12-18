<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $table = 'skills';
    
    protected $fillable = [
        'skills',
        'active'
          
    ];

    protected $hidden = [
        'updated_at',
		'created_at',
    ];
}
