<?php

namespace App\Http\Controllers;

use App\Models\Links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    function index(): object
    {
        $user = Auth::user();
        $needToFill = ['username', 'first_name', 'born_date', 'country', 'organization', 'bio', 'email'];
        $filled = 0;
        for ($i = 0; $i < count($needToFill); $i++) {
            if (!is_null($user[$needToFill[$i]])) {
                $filled++;
            }
        }

        $counter = [
            'links' => Links::where('user_id', $user->id)->get()->count(),
            'views' => Links::where('user_id', $user->id)->sum('counter'),
            'profile' => ($filled / count($needToFill)) * 100
        ];

        return view('Dashboard.Index', [
            'data' => parent::seo('Dashboard'),
            'counter' => $counter
        ]);
    }

    function whatsNew(): object
    {
        return view('Dashboard.WhatsNew', [
            'data' => parent::seo('Apa Yang Baru'),
        ]);
    }
}