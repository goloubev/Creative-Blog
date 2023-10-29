<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class EditController extends Controller
{
    public function index(Comment $comment): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('personal/comments/edit', [
            'comment' => $comment,
        ]);
    }
}
