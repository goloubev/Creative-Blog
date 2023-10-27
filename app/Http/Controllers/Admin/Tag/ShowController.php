<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class ShowController extends Controller
{
    public function index(Tag $tag): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin/tags/show', [
            'tag' => $tag,
        ]);
    }
}
