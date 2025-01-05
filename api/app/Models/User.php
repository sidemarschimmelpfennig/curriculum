<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
	use HasFactory, Notifiable, HasApiTokens;
	
    protected $table = 'users';
	
	protected $fillable = [
		'full_name',
		'email',
		'password',
		'is_admin',
		'active'
		
	];

	protected $hidden = [
        'password', 
		'remember_token',
		'created_at',
		'updated_at'
    ];
}
