<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogpost extends Model
{
    protected $table = 'blogposts';
    public function comments()
    {
        return $this->hasMany('App\Comment', 'blog_id', 'id');
    }
}
