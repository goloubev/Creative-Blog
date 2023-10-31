<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function index(Post $post): RedirectResponse
    {
        if (isset(auth()->user()->id)) {
            // Add/remove "like"
            // likedPosts : \app\Models\User.php
            auth()->user()->likedPosts()->toggle($post->id);
        }

        return redirect()->back();
    }
}
