<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function index(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $password = Str::random(10);
        $data['password'] = Hash::make($password);
        $userId = User::create($data);

        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
        ];
        Mail::to($data['email'], $data['name'])->send(new PasswordMail($userData));

        return redirect()->route('admin.user.show', $userId)->with('success', 'Successfully created');
    }
}
