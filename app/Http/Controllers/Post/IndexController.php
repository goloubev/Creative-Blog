<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class IndexController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Post::paginate(6);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'desc')->get()->take(3);

        return view('main/index', [
            'posts' => $posts,
            'likedPosts' => $likedPosts,
        ]);
    }
}
