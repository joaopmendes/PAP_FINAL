<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function blogpost()
    {
        return $this->belongsTo('App\blogpost', 'blog_id', 'id');
    }
}

