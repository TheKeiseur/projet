<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function getTotalPosts(): array
    {
        return DB::select('
            SELECT COUNT(posts.id) AS totalPosts 
            FROM posts
            INNER JOIN users ON users.id = posts.user_id
            GROUP BY users.id
            ORDER BY totalPosts DESC
        ');
    }
}