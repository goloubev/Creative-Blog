<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class IndexController extends Controller
{
    public function index(Category $category): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $posts = $category->posts()->paginate(6);

        return view('category.post.index', ['posts' => $posts]);
    }
}
