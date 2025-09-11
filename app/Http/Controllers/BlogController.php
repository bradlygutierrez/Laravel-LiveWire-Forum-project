<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;


class BlogController extends Controller
{
    public function show()
    {
        $blog = Blog::all();
        return view('blog.show', compact('blog'));
    }
}