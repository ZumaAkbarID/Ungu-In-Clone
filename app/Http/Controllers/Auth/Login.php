<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    function form(): object
    {
        return view('Auth.Login', [
            'data' => parent::seo('Masuk')
        ]);
    }

    function process(Request $request): object
    {
        $this->validate(
            $request,
            [
                'auth' => 'required',
                'password' => 'required',
            ],
            [
                'auth.required' => 'Email atau username wajib diisi',
                'password.required' => 'Password wajib diisi',
            ]
        );

        if ($request->remember) {
            $remembering = true;
        } else {
            $remembering = false;
        }

        if (filter_var($request->auth, FILTER_VALIDATE_EMAIL)) {
            try {
                Auth::attempt(['email' => $request->auth, 'password' => config('password.salt_front') . $request->password . config('password.salt_back')], $remembering);
                return redirect()->intended('/dashboard');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Akun tidak ditemukan');
            }
        } else {
            try {
                Auth::attempt(['username' => $request->auth, 'password' => config('password.salt_front') . $request->password . config('password.salt_back')], $remembering);
                return redirect()->intended('/dashboard');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Akun tidak ditemukan');
            }
        }
    }
}
