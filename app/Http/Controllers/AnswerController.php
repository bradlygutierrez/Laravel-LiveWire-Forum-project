<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\Blog;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //
    public function store(Request $request, Question $question)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

       
        $question -> answers()->create([
            'user_id' => 20,
            'content' => $request->input('content'),
        ]); 

        return back();
    }

    public function storeBlog(Request $request, Blog $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $post->answers()->create([
            'user_id' => 20,
            'content' => $request->input('content'),
        ]);

        return back();
    }
}
