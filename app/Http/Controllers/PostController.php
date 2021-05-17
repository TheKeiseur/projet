<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('users')->latest()->paginate(15);
        
        return view('posts.index', [
            'posts' => $posts
        ]);
    }
}
