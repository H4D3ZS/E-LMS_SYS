<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';
    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

}
