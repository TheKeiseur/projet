<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class DefaultController extends Controller
{
    public function home()
    {
        $posts = Post::latest()->with('user')->take(5)->get();
        $categories = Category::all();
        
        return view('homepage', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
}
