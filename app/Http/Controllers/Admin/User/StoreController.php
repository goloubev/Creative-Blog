<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function index(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $userId = User::create($data);
        return redirect()->route('admin.user.show', $userId)->with('success', 'Successfully created');
    }
}
