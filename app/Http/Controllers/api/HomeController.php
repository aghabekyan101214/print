<?php

namespace App\Http\Controllers\api;

use App\helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\modelsAdmin\Logo;
use App\modelsAdmin\Product;
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
        $printServices = Product::where("category", 0)->get();
        $signage = Product::where("category", 1)->get();
        $apparel = Product::where("category", 2)->get();
        $resp = array(
            "about" => $data,
            "logos" => $logos,
            "printServices" => $printServices,
            "signage" => $signage,
            "apparel" => $apparel
        );
        return response()->json($resp);
    }
}
