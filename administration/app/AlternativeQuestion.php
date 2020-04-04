<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlternativeQuestion extends Model
{
    protected $fillable = ['question'];

    public function Question()
    {
        return $this->belongsTo('App\Question');
    }
}
