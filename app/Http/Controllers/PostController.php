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
    public function show(string $id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        
        // firstOrFail revient à faire ça : 
        // if ($post === null) {
        //     abort(404);
        // }
        
        // Liste des commentaires sans tri
        // $comments = $post->comments;
        
        // Liste des commentaires du plus récent au plus ancien
        // $comments = $post->comments()->latest()->get();
        
        // Récupération de la liste des catégories
        // $categories = $post->categories;
        
        return view('posts.show', [
            'post' => $post,
            // 'comments' => $comments,
            // 'categories' => $categories
        ]);
    }
}
