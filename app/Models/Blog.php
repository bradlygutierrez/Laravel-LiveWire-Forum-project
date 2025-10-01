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

    protected static function booted(){
        static::deleting(function($blog){
            $blog -> hearts()->delete();
            $blog -> comments()->get()->each(function ($comment){
                $comment -> hearts()-> delete();
                $comment ->delete();
            });

            $blog -> answers()->get() -> each(function ($answer){
                $answer -> hearts()-> delete();

                $answer->comments()->get()->each(function ($comment){
                    $comment -> hearts()-> delete();
                    $comment -> delete();
                });

                $answer -> delete();
            });


        });
    }
}
