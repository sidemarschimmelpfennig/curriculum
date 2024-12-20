<?php

namespace App\Models;

use App\Events\StatusUpdatedEvent;
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
        'password',
        'phone',
        'additional_info',
        'file',
        'status',
        'active'
        
    ];

    protected $hidden = [
        'updated_at',
		'created_at',
        
    ];

}
