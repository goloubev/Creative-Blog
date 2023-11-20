<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class EditController extends BaseController
{
    public function index(Post $post): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin/posts/edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }
}
