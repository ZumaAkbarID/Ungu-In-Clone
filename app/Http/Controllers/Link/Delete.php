<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Models\Links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Delete extends Controller
{
    function process(Request $request, $shorten): object
    {
        $user = Auth::user();
        $query = Links::where('shorten', $shorten)->first();

        abort_if(!$query || $query->user_id !== $user->id, 403, 'You are not allowed to delete');

        try {
            $query->delete();
            return redirect()->back()->with('success', 'Hapus link berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Hapus link gagal');
        }
    }
}
