<?php

namespace App\Http\Controllers\admin;

use App\modelsAdmin\HomeBanner;
use App\modelsAdmin\Product;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomeBannerController extends Controller
{

    const FOLDER = "admin.homeBanners.";

    const ROUTE = "/admin/home-banners";

    const UPLOAD_FOLDER = "banners";

    const TITLE = "Home Banners";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HomeBanner::all();
        $count = count($data);
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER."index", compact("data", "route", "title", "count"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where("category", 1)->get();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER."create", compact("products", "route", "title"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = HomeBanner::all();
        if(count($data) >= 4) {
            return redirect(self::ROUTE);
        }
        $request->validate([
            'image' => 'required|image',
            'product_slug' => 'required'
        ]);

        $file = Storage::putFile(self::UPLOAD_FOLDER, new File($request->image), 'public');

        $homeBanner = new HomeBanner();
        $homeBanner->image = $file;
        $homeBanner->product_slug = $request->product_slug;
        $homeBanner->save();
        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\modelsAdmin\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function show(HomeBanner $homeBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\modelsAdmin\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeBanner $homeBanner)
    {
        $products = Product::where("category", 1)->get();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER."edit", compact("homeBanner", "route", "title", "products"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\modelsAdmin\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeBanner $homeBanner)
    {
        $request->validate([
            'image' => 'image',
            'product_slug' => 'required'
        ]);
        if(null != $request->image){
            $file = Storage::putFile(self::UPLOAD_FOLDER, new File($request->image), 'public');
            $homeBanner->image = $file;
        }

        $homeBanner->product_slug = $request->product_slug;
        $homeBanner->save();
        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\modelsAdmin\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeBanner $homeBanner)
    {
        $homeBanner->delete();
        return redirect(self::ROUTE);
    }
}
