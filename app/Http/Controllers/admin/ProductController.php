<?php

namespace App\Http\Controllers\admin;

use App\modelsAdmin\Form;
use App\modelsAdmin\Product;
use App\modelsAdmin\ProductForm;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\helpers\SlugHelper;

class ProductController extends Controller
{

    /**
     * The name of the view folder.
     * @var string
     */
    const FOLDER = "admin.products.";

    /**
     * The name of the Route.
     * @var string
     */
    const ROUTE = "/admin/products";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    /**
     * The name of the Upload Folder.
     * @var string
     */
    const UPLOAD_FOLDER = "products";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = self::ROUTE;
        $data = Product::orderBy("order")->paginate(500);
        $categories = Product::CATEGORIES;
        return view(self::FOLDER . "index", compact("route", "data", "categories"));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Product::CATEGORIES;
        $forms = Form::all();
        $route = self::ROUTE;
        $form1 = Product::FORM_1;
        $form2 = Product::FORM_2;
        return view(self::FOLDER . "create", compact("route", "forms", "categories", "form1", "form2"));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            "category" => 'required|integer',
            "form_id" => "required",
        ]);

        DB::beginTransaction();
        $product = new Product();
        $product->name = $request->name;
        $product->category = $request->category;
        $product->slug = SlugHelper::slugify($request->name);
        $product->save();

        $product->forms()->sync($request->form_id);

        DB::commit();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\modelsAdmin\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $route = self::ROUTE;
        return view(self::FOLDER . "show", compact("route", "product"));
    }

    public function sort(Request $request)
    {

        foreach ($request->form_id as $key => $value) {
            $form = ProductForm::where(["form_id" => $value, "product_id" => $request->product_id])->first();
            $form->order = $key;
            $form->save();
        }
        return redirect(self::ROUTE);
    }

    public function sortProducts(Request $request)
    {
        foreach ($request->product_id as $key => $value) {
            Product::where(["id" => $value])->update(["order" => $key]);
        }
        return redirect(self::ROUTE);
    }

    public function sortProductsView($category)
    {
        $products = Product::where("category", $category)->orderBy("order")->get();
        $categories = Product::CATEGORIES;
        $route = self::ROUTE;
        return view(self::FOLDER."productSort", compact("route", "products", "categories", "category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\modelsAdmin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Product::CATEGORIES;
        $forms = Form::all();
        $route = self::ROUTE;
        $chosenForms = [];
        foreach ($product->forms()->get() as $form){
            $chosenForms[] = $form->id;
        }
        $form1 = Product::FORM_1;
        $form2 = Product::FORM_2;
        return view(self::FOLDER."edit", compact("route", "forms", "categories", "product", "chosenForms", "form1", "form2"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\modelsAdmin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        DB::beginTransaction();
        $product->name = $request->name;
        $product->category = $request->category;
        $product->slug = SlugHelper::slugify($request->name);
        $product->save();

        $product->forms()->sync($request->form_id);

        DB::commit();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\modelsAdmin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Request $request)
    {
        $product->delete();
        return redirect(self::ROUTE);
    }
}
