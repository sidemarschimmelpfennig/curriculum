<?php

namespace App\Models;


use Illuminate\Database\{
    Eloquent\Factories\HasFactory,
    Eloquent\Model

};

class Candidates extends Model
{
    use HasFactory;

    protected $table = 'candidates'; // Nome da tabela no banco de dados

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'additional_info',
        'skills',
        'file',

    ];

    protected $hidden = [
        'updated_at',
		'created_at',
        
    ];

}
