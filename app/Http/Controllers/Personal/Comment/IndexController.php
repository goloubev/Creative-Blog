<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        // auth() - get users ID
        // user() - get user dataw
        // comments - collection
        $comments = auth()->user()->comments;

        return view('personal/comments/index', [
            'comments' => $comments,
        ]);
    }
}
