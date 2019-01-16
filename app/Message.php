<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'topic_id',
        'from',
        'to',
        'message',
        'file',
        'status'

    ];
    public function topic(){
        return $this->belongsTo('App\Topic','topic_id');
    }
    public function user(){
        return $this->belongsTo('App\User','from');
    }
    public function upload(){
        return $this->belongsTo('App\Upload','file');
    }

}
