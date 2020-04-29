<?php

namespace App\Http\Controllers\admin;

use App\modelsAdmin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\modelsAdmin\ProductPrice;
use App\modelsAdmin\FormValuePrice;

class FormValuePriceController extends Controller
{

    const FOLDER = "admin.valuePrices.";

    const ROUTE = "/admin/product-prices";

    const TITLE = "Prices";

    public function index(Request $request)
    {

        $data = Product::whereHas("productForms")->with(["productForms" => function($query) {
            $query->whereHas("values")->with(["values", "form"]);
        }])->get();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER."index", compact("data", "route", "title"));
    }

    public function edit($id)
    {
        $data = Product::where("id", $id)
            ->with(["productForms" => function($query) {
            $query->whereHas("values")->with(["values", "form"]);
        }])->first();
        $route = self::ROUTE;
        $title = self::TITLE;

        return view(self::FOLDER."add", compact("data", "route", "title"));
    }

    public function store(Request $request)
    {
        $arr = $request->arr;
        $price = $request->price;
        if(!is_array($arr) || empty($arr)) {
            return 0;
        }
        if(!is_numeric($price)){
            return 0;
        }
        $check = $this->checkMatches($request->product_id, $arr);
        if(!$check) {
            return -1;
        }
        $productPrice = new ProductPrice();
        $productPrice->price = $price;
        $productPrice->product_id = $request->product_id;
        $productPrice->save();
        $productPrice->valuePrices()->createMany($arr);
        return 1;
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
                return 0;
            }
        }
        return 1;
    }
}
