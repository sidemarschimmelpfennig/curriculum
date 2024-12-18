<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculums extends Model
{
    protected $table = 'curriculums';
    protected $fillable = [
        'path',
        'candidate_id',
        'candidate'

    ];

    protected $hidden = [
		'updated_at',
		'created_at'
	];
}
