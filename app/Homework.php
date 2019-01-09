<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $fillable = [
        'title',
        'topic_id',
        'teacher_id',
        'question',
        'file'
    ];
}
