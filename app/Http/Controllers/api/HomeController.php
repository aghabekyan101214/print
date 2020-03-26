<?php

namespace App\Http\Controllers\api;

use App\helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\modelsAdmin\Logo;
use Illuminate\Http\Request;
use App\modelsAdmin\StaticData;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function index()
    {
        $data = StaticData::selectRaw("about_text")->first();
        $url = Url::to("/");
        $logos = Logo::selectRaw("id, concat('".$url."/uploads/', image) as image")->get();
        $resp = array(
            "about" => $data,
            "logos" => $logos
        );
        return response()->json($resp);
    }
}
