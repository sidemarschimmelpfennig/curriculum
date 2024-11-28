<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentCategory extends Model
{
    protected $table = 'department_categories';

    protected $fillable = [
        'name'
    ];
}
