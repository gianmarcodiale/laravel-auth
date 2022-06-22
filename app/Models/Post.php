<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    // Create the fillable date for the model
    protected $fillable = ['title', 'author', 'content', 'cover_image', 'slug'];
    // Create a static function for slug generation
    /**
     * # Generate a slug from post title
     * 
     * @return slug generated form post title
     */
    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }
}
