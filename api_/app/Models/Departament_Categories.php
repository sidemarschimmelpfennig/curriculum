<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departament_Categories extends Model
{
    protected $table = 'departament_categories';
    protected $fillable = [
        'departament_categorie',
        'active'
    ];

    protected $hidden = [
        'updated_at',
		'created_at',
    ];
}
