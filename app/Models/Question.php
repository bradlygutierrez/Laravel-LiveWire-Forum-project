<?php

namespace App\Models;

use App\Traits\HasHeart;
use App\Traits\HasProperties;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory, HasHeart, HasProperties;

    protected static function booted(){
        static::deleting(function($question){
            $question -> hearts()->delete();
            $question -> comments()->get()->each(function ($comment){
               $comment -> hearts()-> delete();
               $comment ->delete();
            });

            $question -> answers()->get() -> each(function ($answer){
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
