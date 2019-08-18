<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [];

    
    public function posts() 
    {
        return $this->hasMany(Post::class);
    }
}
