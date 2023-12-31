<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class ShowController extends Controller
{
    public function index(Post $post): View
    {
        $postDate = Carbon::parse($post->created_at)->format('j F Y, H:i');
        $commentsCount = $post->comments->count();
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);

        return view('post/show', [
            'post' => $post,
            'postDate' => $postDate,
            'commentsCount' => $commentsCount,
            'relatedPosts' => $relatedPosts,
        ]);
    }
}
