<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'answer'];

    public function alternative()
    {
        return $this->hasMany('App\AlternativeQuestion');
    }
}
