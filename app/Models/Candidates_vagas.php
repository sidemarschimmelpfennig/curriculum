<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidates_vagas extends Model
{
    use HasFactory;

    protected $table = 'candidates_vagas';

    protected $fillable = [
        'job_id',
        'job',
		'full_name',
        'file',
    ];
}
