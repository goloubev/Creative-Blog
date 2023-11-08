<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class ShowController extends Controller
{
    public function index(Tag $tag): View
    {
        return view('admin/tags/show', [
            'tag' => $tag,
        ]);
    }
}
