<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'

    ];
    
    protected $table = 'candidates';

    protected $fillable = [
        'full_name',
        'contactphone',
        'contactphone_two',
        'email',
        'city',
        'address', 
        'observation',
        'additional',
        'socialmedia',

        //Login
        'login',
		'password',
         
    ];
}
