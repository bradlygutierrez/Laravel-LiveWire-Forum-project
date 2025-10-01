<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;


class BlogController extends Controller
{
    public function show()
    {
        $userId = 20;
        $blogs = Blog::with([
            'user',
            'category',
            'answers' => fn($query) => $query->with([
                'user',
                'hearts' => fn($query) => $query->where('user_id', $userId),
                'comments' => fn($query) => $query->with([
                    'user',
                    'hearts' => fn($query) => $query->where('user_id', $userId),
                ])->where('user_id', $userId),
            ]),
            'comments' => fn($query) => $query->with([
                'user',
                'hearts' => fn($query) => $query->where('user_id', $userId),
            ]),
            'hearts' => fn($query) => $query->where('user_id', $userId),
        ])->get();

        return view('blog.show', compact('blogs'));
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect('/blog')->with('success', 'Blog has been deleted');
    }
}
