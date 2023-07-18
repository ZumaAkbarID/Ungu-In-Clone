<?php

namespace App\Http\Controllers;

use App\Jobs\AnalizeVisitor;
use App\Models\Links;
use App\Models\LinksVisitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HandleVisit extends Controller
{
    function process(Request $request, $shorten): object
    {
        $link = Links::where('shorten', $shorten)->first();
        abort_if(!$link, 404, "Link yang Anda akses tidak ditemukan");
        $checkVisitor = LinksVisitor::where('ip_address', $request->getClientIp())
            ->where('created_at', '>', Carbon::now()->subMinutes(1))
            ->exists();

        if ($checkVisitor) {
            return redirect($link->original);
        } else {
            $visitor = new LinksVisitor();
            $visitor->link_id = $link->id;
            $visitor->ip_address = $request->getClientIp();
            $visitor->user_agent = $request->userAgent();
            $visitor->get_ref = $request->get('ref');
            $visitor->http_referer = $request->header('HTTP_REFERER');
            $visitor->checked = false;
            if ($visitor->save()) {
                $link->update(['counter' => $link->counter + 1]);
                dispatch(new AnalizeVisitor($visitor->id));
                return redirect($link->original);
                die;
            } else {
                $visitor->delete();
                return abort(500, "Error system");
            }
        }
    }
}
