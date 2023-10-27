<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class ShowController extends BaseController
{
    public function index(Post $post): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        //dd($categories);

        return view('admin/posts/show', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }
}
