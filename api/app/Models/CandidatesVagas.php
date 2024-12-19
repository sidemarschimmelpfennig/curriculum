<?php

namespace App\Models;


use Illuminate\Database\{
    Eloquent\Factories\HasFactory,
    Eloquent\Model

};

class CandidatesVagas extends Model
{
    use HasFactory;

    protected $table = 'candidates_vagas'; 

    protected $fillable = [
        'job_id',
        'job',
        'candidate_id',
        'full_name',
        'file'

    ];

    protected $hidden = [
        'updated_at',
		'created_at',        
    ];

}
