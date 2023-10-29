<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function index(Post $post): RedirectResponse
    {
        // auth() - get users ID
        // user() - get user data
        if (!empty(auth()->user()->id)) {
            $userId = auth()->user()->id;

            DB::table('user_post_likes')
                ->where('user_id', $userId)
                ->where('post_id', $post->id)
                ->delete();
        }

        return redirect()->route('personal.liked.index');
    }
}
