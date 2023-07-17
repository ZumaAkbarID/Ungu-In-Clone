<?php

namespace App\Http\Controllers;

use App\Models\Links;
use App\Models\User;
use Illuminate\Http\Request;

class Main extends Controller
{
    function index(): object
    {
        $result = [];
        if (session()->has('result')) {
            $result['qr_code'] = generateQR(url('/') . '/' . session('result'));
        }

        return view('Main.Index', [
            'data' => parent::seo('Make Your Aesthetic Link'),
            'result' => $result,
            'showcase' => [
                'users' => User::all()->count(),
                'links' => Links::all()->count()
            ]
        ]);
    }
}
