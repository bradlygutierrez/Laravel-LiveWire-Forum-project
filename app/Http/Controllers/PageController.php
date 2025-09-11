<?php

namespace App\Http\Controllers;
use App\Models\Question;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $questions = Question::with('answers','category','user')->latest()->get();
    
        return view('pages.home', [
            'questions' => $questions
        ]);

        
    }
}
