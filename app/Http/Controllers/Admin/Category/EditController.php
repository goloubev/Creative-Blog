<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function index(Category $category): View
    {
        return view('admin/categories/edit', [
            'category' => $category
        ]);
    }
}
