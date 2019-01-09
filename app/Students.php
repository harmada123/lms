<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'name',
        'mname',
        'lname',
        'birthday',
        'photo_id',
        'course',
        'section_id',
        'address',
        'gender',
        'isActive'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    public function section(){
        return $this->belongsTo('App\Section');
    }
    public function course(){
        return $this->belongsTo('App\Course');
    }
}
