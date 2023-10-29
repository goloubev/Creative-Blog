<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function index(int $postId): RedirectResponse
    {
        // auth() - get users ID
        // user() - get user data
        if (!empty(auth()->user()->id)) {
            $userId = auth()->user()->id;

            DB::table('user_post_likes')
                ->where('user_id', $userId)
                ->where('post_id', $postId)
                ->delete();
        }

        return redirect()->route('personal.liked.index')->with('success', 'Successfully deleted');
    }
}
