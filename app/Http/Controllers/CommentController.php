<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(int $id, Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'content' => 'required|min:3',
        ]);
        
        // On récupère le post ou, s'il n'existe pas, on renvoie une page 404
        $post = Post::findOrFail($id);
        
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = 1;
        $comment->save();
        
        return redirect()->route('posts.show', ['id' => $post->id]);
    }
    
}
