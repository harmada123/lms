<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'section_id',
        'subject_id',
        'file',
        'topic',
        'description'
    ];

    public function upload(){
        return $this->belongsTo('App\Upload','file');
    }
    public function message(){
        return $this->hasMany('App\Message');
    }
}
