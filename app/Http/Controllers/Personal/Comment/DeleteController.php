<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function index(Comment $comment): RedirectResponse
    {
        /*// auth() - get users ID
        // user() - get user data
        if (!empty(auth()->user()->id)) {
            $userId = auth()->user()->id;

            DB::table('comments')
                ->where('id', $comment->id)
                ->where('user_id', $userId)
                ->delete();
        }*/

        $comment->delete();

        return redirect()->route('personal.comment.index')->with('success', 'Successfully deleted');
    }
}
