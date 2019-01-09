<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'section',
        'location',
        'course_id',
        'teacher_id'
    ];
    public function teacher(){
        return $this->belongsTo('App\Teacher','teacher_id');
    }
}
