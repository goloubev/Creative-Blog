<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
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
        $user = User::create($data);

        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
        ];

        // Send email with new password
        // PasswordMail : implements ShouldQueue
        Mail::to($data['email'], $data['name'])->send(new PasswordMail($userData));

        // Send account verification email
        event(new Registered($user));

        return redirect()->route('admin.user.show', $user)->with('success', 'Successfully created');
    }
}
