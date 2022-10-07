<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        "title"
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    public function posts() {
        return $this->belongsToMany(Post::class, "posts_tags");
    }
}
