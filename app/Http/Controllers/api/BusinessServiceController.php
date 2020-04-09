<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\modelsAdmin\BusinessService;
use App\modelsAdmin\Product;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class BusinessServiceController extends Controller
{
    public function index()
    {
        $url = Url::to("/");
        $services = BusinessService::selectRaw("title, concat('".$url."/uploads/', image) as image, slug")->get();
        return response()->json($services);
    }

    public function getBusinessService($slug)
    {
        $url = Url::to("/");
        $printServices = Product::where("category", 0)->get();
        $signage = Product::where("category", 1)->get();
        $apparel = Product::where("category", 2)->get();
        $service = BusinessService::selectRaw("id, title, slug")->where("slug", $slug)->with(["images" => function($query) use($url) {
            $query->selectRaw("id, concat('".$url."/uploads/', image) as image, business_service_id");
        }])->first();
        $resp = array(
            "service" => $service,
            "printServices" => $printServices,
            "signage" => $signage,
            "apparel" => $apparel
        );
        return response()->json($resp);
    }
}
