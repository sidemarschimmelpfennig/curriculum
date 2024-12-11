<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
	use Notifiable;

    protected $table = 'users';
	
	protected $fillable = [
		'name',
		'email',
		'password',
		'is_admin',
		
	];

	protected $hidden = [
        'password', 'remember_token',
    ];
}
