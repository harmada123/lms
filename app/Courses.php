<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'course',
        'degree',
        'major',
        'course_code'
    ];
}
