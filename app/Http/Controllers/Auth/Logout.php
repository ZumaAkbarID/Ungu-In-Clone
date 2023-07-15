<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    function process(Request $request): object
    {
        try {
            Auth::logout();
            $request->session()->regenerate();
            return redirect()->to(route('Landing'))->with('success', 'Logout berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Logout gagal');
        }
    }
}
