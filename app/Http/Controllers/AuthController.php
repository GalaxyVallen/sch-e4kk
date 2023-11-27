<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $validated = $request->safe()->only(['usermail', 'password']);

        $user = User::where('email', $validated['usermail'])->orWhere('username', $validated['usermail'])->first();

        if (!$user) {
            session()->flash('fail', 'Incorrect username or password.');
            return redirect()->back();
        }

        $crendetials = [
            'email' => $user->email,
            'password' => $validated['password']
        ];

        if (Auth::attempt($crendetials)) {
            $request->session()->regenerate();
            return redirect()->intended();
        } else {
            session()->flash('fail', 'Incorrect username or password.');
            return redirect()->back();
        }
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $validated = $request->safe()->only(['name', 'username', 'email', 'password']);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        $greets = 'Welcom to ' . config('app.name') . ', ' . $validated['name'] . '!';

        session()->flash('success', $greets);
        return to_route('login');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return to_route('login');
    }
}
