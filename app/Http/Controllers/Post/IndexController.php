<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        // with : \app\Models\Post.php
        $posts = Post::with('category')->paginate(6);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'desc')->get()->take(3);

        return view('post/index', [
            'posts' => $posts,
            'likedPosts' => $likedPosts,
        ]);
    }
}
