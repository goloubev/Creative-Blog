<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class EditController extends Controller
{
    public function index(Category $category): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin/categories/edit', [
            'category' => $category
        ]);
    }
}
