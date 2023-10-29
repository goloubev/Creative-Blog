<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\PostUserLike;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class IndexController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = [];
        $data['likedCount'] = PostUserLike::all()->count();
        $data['commentsCount'] = Comment::all()->count();

        return view('personal/main/index', [
            'data' => $data,
        ]);

        return view('personal/main/index');
    }
}
