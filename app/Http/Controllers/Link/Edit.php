<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Models\Links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Edit extends Controller
{
    function form($shorten): object
    {
        $link = Links::where('shorten', $shorten)->first();
        if (!$link || $link->user_id !== Auth::user()->id)
            return redirect()->back()->with('info', 'Link tidak ditemukan.');

        return view('Link.Edit', [
            'data' => parent::seo('Edit Link'),
            'link' => $link
        ]);
    }

    function process(Request $request, $shorten): object
    {
        $query = Links::where('shorten', $shorten)->first();
        $user = Auth::user();
        if (!$query || $query->user_id !== $user->id)
            return redirect()->back()->with('info', 'Link tidak ditemukan.');

        $this->validate(
            $request,
            [
                'original' => 'required|url',
                'shorten' => 'required|max:255|unique:links,shorten,' . $user->id,
            ],
            [
                'original.required' => 'Link panjang wajib diisi',
                'original.url' => 'Link panjang tidak valid',
                'shorten.required' => 'Link singkat wajib diisi',
                'shorten.max' => 'Link singkat maksimal 255 karakter',
                'shorten.unique' => 'Link singkat telah digunakan',
            ]
        );

        try {
            $query->update(['original' => $request->original, 'shorten' => $request->shorten]);
            return redirect()->to(route('Dashboard.Links.Detail', $request->shorten))->with('success', 'Berhasil memperbarui link');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal memperbarui link');
        }
    }
}
