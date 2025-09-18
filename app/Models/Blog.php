<?php

namespace App\Models;

use App\Traits\HasHeart;
use App\Traits\HasProperties;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /** @use HasFactory<\Database\Factories\BlogFactory> */
        protected $casts = [
        'content' => 'array', // cast JSON into array
    ];

    use HasFactory, HasProperties, HasHeart;
}
