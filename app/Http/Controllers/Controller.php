<?php

namespace App\Http\Controllers;

use App\Models\Utility;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public static function seo(string $title)
    {
        $data = [];
        $dataRaw = [];

        foreach (Utility::all() as $util) {
            $dataRaw[$util->u_key] = $util->u_value;
        }

        if (!empty($title)) {
            $data['title'] = $title . ' | ' . $dataRaw['app_name'];
        } else {
            $data['title'] = $title;
        }

        $data['description'] = $dataRaw['description'];
        $data['keywords'] = $dataRaw['keywords'];
        $data['author'] = $dataRaw['author'];

        return $data;
    }
}
