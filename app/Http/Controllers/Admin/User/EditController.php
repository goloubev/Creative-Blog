<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function index(User $user): View
    {
        $roles = User::getRoles();

        return view('admin/users/edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }
}
