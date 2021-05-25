<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_upload extends Model
{
    protected $guarded = [];

    public function postupload()
    {
        return $this->belongsTo(Post::class);
    }
}
