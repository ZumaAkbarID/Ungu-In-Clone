<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Edit extends Controller
{
    function form(): object
    {
        return view('Profile.Edit', [
            'data' => parent::seo('Edit Profil'),
            'user' => Auth::user()
        ]);
    }

    function process(Request $request): object
    {
        $user = Auth::user();

        $updated = 1;
        $needToUpdate = [];
        foreach ($request->except(['_token', 'email', 'username']) as $key => $val) {
            if ($user->$key !== $val) {
                $needToUpdate[$key] = $val;
                $updated++;
            }
        }
        try {
            User::find($user->id)->update($needToUpdate);
            return redirect()->to('/dashboard')->with('success', $updated . ' data berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data gagal diperbarui');
        }
    }
}
