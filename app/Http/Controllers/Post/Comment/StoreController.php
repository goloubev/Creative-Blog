<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function index(Post $post, StoreRequest $request): RedirectResponse
    {
        if (isset(auth()->user()->id)) {
            $data = $request->validated();
            $data['user_id'] = auth()->user()->id;
            $data['post_id'] = $post->id;

            Comment::create($data);

            return redirect()->route('post.show', $post->id)->with('success', 'Comment is successfully added');
        }
        else {
            return redirect()->route('post.show', $post->id);
        }
    }
}
