<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    function form(): object
    {
        return view('Auth.Register', [
            'data' => parent::seo('Daftar')
        ]);
    }

    function process(Request $request): object
    {
        $this->validate(
            $request,
            [
                'username' => 'required|min:4|max:100|unique:users,username',
                'email' => 'required|email:rfc,dns|unique:users,email',
                'first_name' => 'required',
                'password' => 'required|confirmed',
            ],
            [
                'username.required' => 'Username wajib diisi.',
                'username.min' => 'Username minimal 4 karakter.',
                'username.max' => 'Username maksimal 100 karakter.',
                'username.unique' => 'Username telah digunakan.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Email tidak valid.',
                'email.unique' => 'Email telah terdaftar.',
                'first_name.required' => 'Nama depan wajib diisi.',
                'password.required' => 'Password wajib diisi.',
                'password.confirmed' => 'Password konfirmasi tidak sama.',
            ]
        );

        $newUser = [
            'username' => $request->username,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'password' => Hash::make(config('password.salt_front') . $request->password . config('password.salt_back')),
        ];

        if ($request->last_name) {
            $newUser['last_name'] = $request->last_name;
        }

        try {
            User::create($newUser);
            try {
                Auth::attempt(['username' => $request->username, 'password' => config('password.salt_front') . $request->password . config('password.salt_back')]);
                return redirect()->intended(route('Dashboard'))->with('success', 'Selamat datang di Ungu.In Clone');
            } catch (\Throwable $th) {
                return redirect()->back()->with('success', 'Akun berhasil didaftarkan');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Akun gagal didaftarkan');
        }
    }
}
