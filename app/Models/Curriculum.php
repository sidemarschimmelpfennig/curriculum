<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'candidates'; // Nome da tabela no banco de dados

    protected $fillable = [
        'full_name',
        'email',
        'contactphone',
        'additional_info',
        'ability',
        'file'

    ];

    protected $hidden = [
        'updated_at',
		'created_at'
        
    ];

}
