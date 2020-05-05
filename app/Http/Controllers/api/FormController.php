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
        $resp = array(
            "forms" => $form->productForms ?? []
        );
        return ResponseHelper::success($resp);
    }

    public function getPrice(Request $request)
    {
        $price = $this->checkMatches($request->productId, $request->arr);
        $resp = array(
            "price" => $price
        );
        return response()->json($resp);

    }

    private function checkMatches($product_id, $arr)
    {
        $productPrice = ProductPrice::with("valuePrices")->where("product_id", $product_id)->get();
        foreach ($productPrice as $p) {
            $savedArr = [];
            foreach ($p->valuePrices as $v) {
                $savedArr[]['form_value_id'] = $v->form_value_id;
            }
            if($savedArr == $arr) {
                return $p->price;
            }
        }
        return 0;
    }
}
