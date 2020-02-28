<?php

namespace App\Http\Controllers\api;

use App\helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modelsAdmin\StaticData;

class HomeController extends Controller
{
    public function index()
    {
        $data = StaticData::selectRaw("about_title, about_text")->first();
        return response()->json($data);
    }
}
