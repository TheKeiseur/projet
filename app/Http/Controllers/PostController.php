<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(15);
        
        return view('posts.index', [
            'posts' => $posts
        ]);
    }
}
