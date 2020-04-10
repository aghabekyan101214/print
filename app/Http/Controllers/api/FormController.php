<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modelsAdmin\Product;
use App\helpers\ResponseHelper;

class FormController extends Controller
{
    public function index($slug)
    {
        $form = Product::where("slug", $slug)->with(["productForms" => function($query) {
            $query->with(["values", "form"]);
        }])->first();
        $resp = array(
            "forms" => $form->productForms ?? []
        );
        return ResponseHelper::success($resp);
    }
}
