<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'content', 'is_active'
    ];

    function user() {
        return $this->belongsTo(User::class);
    }
}
