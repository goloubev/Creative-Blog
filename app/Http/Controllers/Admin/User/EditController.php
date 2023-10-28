<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class EditController extends Controller
{
    public function index(User $user): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $roles = User::getRoles();

        return view('admin/users/edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }
}
