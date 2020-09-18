<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = [
        'user_id', 'name'
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function (Category $category) {
            foreach ($category->posts as $post)
                $post->deleteImage();
        });
    }

    function user() {
        return $this->belongsTo(User::class);
    }

    function posts() {
        return $this->hasMany(Post::class);
    }

    function likes() {
        return $this->hasManyThrough(Like::class, Post::class);
    }
}
