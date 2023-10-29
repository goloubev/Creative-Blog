<?php

namespace App\Http\Controllers\Personal\Comments;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class IndexController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
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
