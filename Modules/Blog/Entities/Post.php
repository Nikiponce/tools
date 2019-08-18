<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'content',
        'slug',
        'status',
        'published_at'
    ];

    public function categories() 
    {
        return $this->belongsToMany(Category::class, 'posts_categories');
    }

    public function image() 
    {
        return $this->belongsTo(Image::class);
    }


    static public function toSlug($string)
    {
        $string = strtolower($string);
        $string = html_entity_decode($string);
        $string = str_replace(array('ä', 'ü', 'ö', 'ß'), array('ae', 'ue', 'oe', 'ss'), $string);
        $string = preg_replace('#[^\w\säüöß]#', null, $string);
        $string = preg_replace('#[\s]{2,}#', ' ', $string);
        $string = str_replace(array(' '), array('-'), $string);
        return $string;
    }
}
