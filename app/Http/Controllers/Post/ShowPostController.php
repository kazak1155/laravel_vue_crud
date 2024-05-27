<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowPostController extends Controller
{
    public function snowAllPost()
    {
        $posts = Post::query()
            ->orderByDesc('updated_at')
            ->get();
        return  $posts;
    }
}
