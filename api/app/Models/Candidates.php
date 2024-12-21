<?php

namespace App\Models;

use Illuminate\Database\{
    Eloquent\Factories\HasFactory,
    Eloquent\Model

};

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Candidates extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'candidates'; // Nome da tabela no banco de dados

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'additional_info',
        
        'curriculum',
        'status',
        'active'
        
    ];

    protected $hidden = [
        'updated_at',
		'created_at',
        
    ];

}
