<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $errors = [
            'usermail.required' => 'Username atau Email harus diisi',
            'password.required' => 'Password harus diisi',
        ];
        $validated = $request->validate([
            'usermail' => 'required',
            'password' => 'required'
        ], $errors);

        $user = User::where('email', $validated['usermail'])->orWhere('username', $validated['usermail'])->first();

        if (!$user) {
            session()->flash('gagal', 'Sign in gagal!');
            return redirect()->back();
        }

        $crendetials = [
            'email' => $user->email,
            'password' => $validated['password']
        ];
        
        if (Auth::attempt($crendetials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } else {
            session()->flash('gagal', 'Sign in gagal! Ntah username g d / email yg slh');
            return redirect()->back()->withInput();
        }
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $validated = $request->safe()->only(['name', 'username', 'email', 'password']);

        $validated['password'] = Hash::make($validated['password']);

        dd($validated);

        User::create($validated);

        session()->flash('success', 'Berhasil sign up! Silahkan sign in');
        return redirect('/signin');
    }
}
