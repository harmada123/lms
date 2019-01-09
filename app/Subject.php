<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'subject',
        'subject_code',
        'unit',
        'course_id'
    ];
}
