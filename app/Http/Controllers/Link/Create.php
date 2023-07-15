<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Models\Links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Create extends Controller
{
    function form(): object
    {
        return view('Link.Create', [
            'data' => parent::seo('Buat Link Pendek')
        ]);
    }

    function process(Request $request): object
    {
        $this->validate(
            $request,
            [
                'original' => 'required|url',
                'shorten' => 'required|max:255',
            ],
            [
                'original.required' => 'Link panjang wajib diisi',
                'original.url' => 'Link panjang tidak valid',
                'shorten.required' => 'Link singkat wajib diisi',
                'shorten.max' => 'Link singkat maksimal 255 karakter',
            ]
        );

        $tempSlug = make_slug_incasesensitive($request->shorten);
        if (count(Links::where('shorten', $tempSlug)->get()) > 0) {
            return redirect()->back()->with('error', 'Link pendek telah digunakan');
        } else if ($request->shorten !== $tempSlug) {
            return redirect()->back()->with('error', 'Link pendek tidak valid');
        }

        try {
            Links::create([
                'user_id' => (Auth::check()) ? Auth::user()->id : null,
                'original' => $request->original,
                'shorten' => $tempSlug,
            ]);
            if (Auth::check()) {
                return redirect()->to(route('Dashboard.Links'));
            } else {
                return redirect()->to(route('Landing', '#show-link'))->with('result', url('/') . '/' . $tempSlug);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Link pendek gagal dibuat');
        }
    }
}
