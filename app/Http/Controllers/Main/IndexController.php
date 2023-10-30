<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class IndexController extends Controller
{
    public function index(): RedirectResponse
    {
        return redirect()->route('post.index');
    }
}
