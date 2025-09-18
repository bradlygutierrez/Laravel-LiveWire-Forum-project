<?php

namespace App\Traits;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Category;
use App\Models\User;
use App\Models\Answer;
use App\Models\Comment;
trait HasProperties
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}