<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;

class CreateController extends Controller
{
    public function index(): View
    {
        $roles = User::getRoles();

        return view('admin/users/create', [
            'roles' => $roles,
        ]);
    }
}
