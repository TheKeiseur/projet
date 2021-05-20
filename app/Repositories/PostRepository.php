<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use stdClass;

class PostRepository
{
    public function getTotalPosts(): array
    {
        return DB::select('SELECT * FROM posts');
    }
}

