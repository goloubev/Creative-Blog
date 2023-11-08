<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();

        return view('category.index', [
            'categories' => $categories,
        ]);
    }
}
