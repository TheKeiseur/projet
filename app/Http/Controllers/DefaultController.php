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
        $posts = Post::latest()->with('user', 'categories')->take(5)->get();
        
        return view('homepage', [
            'posts' => $posts
        ]);
    }
}
