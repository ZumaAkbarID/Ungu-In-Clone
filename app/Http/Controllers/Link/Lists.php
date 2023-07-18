<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Models\Links;
use App\Models\LinksVisitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $link = Links::where('shorten', $shorten)->with('visitor')->first();
        if (!$link || $link->user_id !== Auth::user()->id)
            return redirect()->back()->with('info', 'Link tidak ditemukan.');

        $detailLink = LinksVisitor::select(DB::raw("COUNT(*) AS count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("MONTH(created_at)"), DB::raw("YEAR(created_at)"), DB::raw("MONTHNAME(created_at)"))
            ->get()
            ->pluck("count", "month_name");

        $city = LinksVisitor::select(DB::raw("COUNT(*) AS count"), 'city')
            ->groupBy('city')
            ->get()
            ->pluck("count", "city");

        $region = LinksVisitor::select(DB::raw("COUNT(*) AS count"), 'region')
            ->groupBy('region')
            ->get()
            ->pluck("count", "region");

        $isp = LinksVisitor::select(DB::raw("COUNT(*) AS count"), 'isp_name')
            ->groupBy('isp_name')
            ->get()
            ->sortByDesc('count')
            ->pluck("count", "isp_name");

        $vpn = LinksVisitor::select(DB::raw("COUNT(*) AS count"), 'is_vpn')
            ->groupBy('is_vpn')
            ->get()
            ->sortByDesc('count')
            ->pluck("count", "is_vpn");

        $country = LinksVisitor::select(DB::raw("COUNT(*) AS count"), 'country', 'flag')
            ->groupBy('country', 'flag')
            ->get()
            ->sortByDesc('count')
            ->mapToGroups(function ($item) {
                return [
                    $item['country'] => [
                        'count' => $item['count'],
                        'flag' => $item['flag'],
                    ]
                ];
            });

        $lists = LinksVisitor::all();

        return view('Link.Detail', [
            'data' => parent::seo('Detail Link'),
            'link' => $link,
            'qr'   => generateQR(url('/') . '/' . $link->shorten),
            'years' => [
                'labels' => $detailLink->keys(),
                'data' => $detailLink->values(),
            ],
            'city' => [
                'labels' => $city->keys(),
                'data' => $city->values()
            ],
            'region' => [
                'labels' => $region->keys(),
                'data' => $region->values()
            ],
            'isp' => $isp,
            'vpn' => $vpn,
            'country' => $country,
            'lists' => $lists,
        ]);
    }
}
