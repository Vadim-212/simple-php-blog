<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function (User $user) {
            foreach ($user->posts as $post)
                $post->deleteImage();
        });
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function todos() {
        return $this->hasMany(Todo::class);
    }
}
