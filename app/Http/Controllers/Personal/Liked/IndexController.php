<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        // auth() - get users ID
        // user() - get user data
        // likedPosts - collection
        $posts = auth()->user()->likedPosts;

        return view('personal/liked/index', [
            'posts' => $posts,
        ]);
    }
}
