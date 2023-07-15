<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Models\Links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Lists extends Controller
{
    function index(Request $request): object
    {
        if (!empty($request->get('keyword')) && empty($request->get('monthYear'))) {
            $links = Links::where('original', 'like', '%' . $request->get('keyword') . '%')
                ->where('user_id', Auth::user()->id);
        } else if (empty($request->get('keyword')) && !empty($request->get('monthYear'))) {
            list($year, $month) = explode('-', $request->get('monthYear'));
            $links = Links::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->where('user_id', Auth::user()->id);
        } else if (!empty($request->get('keyword')) && !empty($request->get('monthYear'))) {
            list($year, $month) = explode('-', $request->get('monthYear'));
            $links = Links::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->where('original', 'like', '%' . $request->get('keyword') . '%')
                ->where('user_id', Auth::user()->id);
        } else {
            $links = Links::where('user_id', Auth::user()->id);
        }

        return view('Link.Lists', [
            'data' => parent::seo('List Link'),
            'links' => $links->orderBy('id', 'DESC')->get()
        ]);
    }

    function detail(Request $request, $shorten): object
    {
        return view('Link.Detail', [
            'data' => parent::seo('Detail'),
        ]);
    }
}
