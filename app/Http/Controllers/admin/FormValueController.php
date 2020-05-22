<?php

namespace App\Http\Controllers\admin;

use App\helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\modelsAdmin\Form;
use Illuminate\Http\Request;
use App\modelsAdmin\Product;
use App\modelsAdmin\FormValue;
use App\modelsAdmin\ProductForm;

class FormValueController extends Controller
{
    const FOLDER = "admin.formValues."; //View Folder Path

    const ROUTE = "/admin/forms/"; // Curent Resource Route

    public function index($product_id)
    {
        $product = Product::findOrFail($product_id);
        $forms = ProductForm::with(["form", "values"])->where("product_id", $product_id)->orderBy("order")->get();
        $route = self::ROUTE;
        return view(self::FOLDER . "index", compact("product", "forms", "route"));
    }

    public function saveFormValue(Request $request)
    {
        $formValue = new FormValue();
        $formValue->product_form_id = $request->product_form_id;
        $formValue->name = $request->val;
        $formValue->save();

        $values = FormValue::where("product_form_id", $request->product_form_id)->get();

        return ResponseHelper::success($values);
    }

    public function editFormValue(Request $request)
    {
        $formValue = FormValue::find($request->product_form_id);
        $formValue->name = $request->val;
        if($formValue->save()){
            return 1;
        }
        return 0;

    }

    public function deleteFormValue(Request $request)
    {
        $formValue = FormValue::find($request->id);
        if($formValue->delete()){
            return 1;
        }
        return 0;
    }
}
