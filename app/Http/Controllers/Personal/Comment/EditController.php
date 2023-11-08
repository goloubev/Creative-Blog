<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function index(Comment $comment): View
    {
        return view('personal/comments/edit', [
            'comment' => $comment,
        ]);
    }
}
