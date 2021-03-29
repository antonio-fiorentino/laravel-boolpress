<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function detail() {
        return $this->hasOne('App\AuthorDetail');
    }

    public function post() {
        return $this->hasMany('App\Post');
    }
}
