<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\modelsAdmin\BusinessService;
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
        $service = BusinessService::selectRaw("id, title, slug")->where("slug", $slug)->with(["images" => function($query) use($url) {
            $query->selectRaw("id, concat('".$url."/uploads/', image) as image, business_service_id");
        }])->first();
        return response()->json($service);
    }
}
