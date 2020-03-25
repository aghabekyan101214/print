<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\modelsAdmin\BusinessService;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BusinessServiceController extends Controller
{

    /**
     * The name of the view folder.
     *
     * @var string
     */
    const FOLDER = "admin.business_services.";

    /**
     * The name of the Route.
     *
     * @var string
     */
    const ROUTE = "/admin/business-services";

    /**
     * The name of the Upload Folder.
     *
     * @var string
     */
    const UPLOAD_FOLDER = "business";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BusinessService::with("images")->paginate(500);
        $route = self::ROUTE;
        return view(self::FOLDER."index", compact("data", "route"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = self::ROUTE;
        return view(self::FOLDER."create", compact("route"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allowedfileExtension = ['jpg', 'png', 'jpeg', 'jfif'];
        $request->validate([
            'title' => 'required|unique:business_services|max:191',
            'image' => 'required|mimes:jpeg,jpg,png,jfif',
            'slug' => 'required|unique:business_services|max:191'
        ]);
        $images = [];
        if(null != $request->images)
            foreach ($request->images as $image) {
                if(in_array($image->getClientOriginalExtension(), $allowedfileExtension)) {
                    $image = Storage::putFile(self::UPLOAD_FOLDER, new File($image), 'public');
                    $images[]["image"] = $image;
                }
            }
        DB::beginTransaction();
        $file = Storage::putFile(self::UPLOAD_FOLDER, new File($request->image), 'public');
        $service = new BusinessService();
        $service->title = $request->title;
        $service->image = $file;
        $service->slug = $request->slug;
        $service->save();

        $service->images()->createMany($images);
        DB::commit();
        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\modelsAdmin\BusinessService  $businessService
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessService $businessService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\modelsAdmin\BusinessService  $businessService
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessService $businessService)
    {
        $route = self::ROUTE;
        return view(self::FOLDER."edit", compact("businessService", "route"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\modelsAdmin\BusinessService  $businessService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessService $businessService)
    {
        $allowedfileExtension = ['jpg', 'png', 'jpeg', 'jfif'];
        $request->validate([
            'title' => $businessService->title != $request->title ? 'required|unique:business_services|max:191' : "",
            'image' => 'mimes:jpeg,jpg,png,jfif',
            'slug' => $businessService->slug == $request->slug ? 'required|max:191' : 'required|max:191|unique:business_services'
        ]);
        $images = [];
        if(null != $request->images)
            foreach ($request->images as $image) {
                if(in_array($image->getClientOriginalExtension(), $allowedfileExtension)) {
                    $image = Storage::putFile(self::UPLOAD_FOLDER, new File($image), 'public');
                    $images[]["image"] = $image;
                }
            }

        DB::beginTransaction();
        if(null != $request->image) {
            $file = Storage::putFile(self::UPLOAD_FOLDER, new File($request->image), 'public');
            $businessService->image = $file;
        }
        $businessService->title = $request->title;
        $businessService->slug = $request->slug;
        $businessService->save();
        if(!empty($images)) {
            $businessService->images()->createMany($images);
        }
        DB::commit();
        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\modelsAdmin\BusinessService  $businessService
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessService $businessService, Request $request)
    {
        if(null == $request->image_id) {
            $businessService->delete();
            return redirect(self::ROUTE);
        }
        $businessService->images()->find($request->image_id)->delete();
    }
}
