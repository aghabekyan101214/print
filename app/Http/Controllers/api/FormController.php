<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\modelsAdmin\ProductPrice;
use Illuminate\Http\Request;
use App\modelsAdmin\Product;
use App\helpers\ResponseHelper;

class FormController extends Controller
{
    public function index($slug)
    {
        $form = Product::where("slug", $slug)->with(["productForms" => function($query) {
            $query->whereHas("values")->with(["values", "form"]);
        }])->first();

        $prices = ProductPrice::with("valuePrices")->where("product_id", $form->id)->get();

        $combinations = $this->pluck($prices, "form_value_id");

        $resp = array(
            "forms" => $form->productForms ?? [],
            "combinations" => $combinations ?? [],
        );
        return ResponseHelper::success($resp);
    }

    public function getPrice(Request $request)
    {
        $price = $this->checkMatches($request->productId, $request->arr);
        $resp = array(
            "price" => $price->price ?? 0,
            "obj" => $price,
        );
        return response()->json($resp);

    }

    private function checkMatches($product_id, $arr)
    {
        $arr = explode(",", $arr);
        $productPrice = ProductPrice::with("valuePrices")->where("product_id", $product_id)->get();
        foreach ($productPrice as $p) {
            $savedArr = [];
            foreach ($p->valuePrices as $v) {
                $savedArr[] = $v->form_value_id;
            }
            if($savedArr == $arr) {
                return $p;
            }
        }
        return 0;
    }

    private function pluck($data, $key)
    {
        $arr = [];
        foreach ($data as $d) {
            $arr []= $d->valuePrices->pluck($key);
        }
        return $arr;
    }
}
