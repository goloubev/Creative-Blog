<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();

        return view('admin/categories/index', [
            'categories' => $categories,
        ]);
    }
}
