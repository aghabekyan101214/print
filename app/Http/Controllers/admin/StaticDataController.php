<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\modelsAdmin\BusinessService;
use App\modelsAdmin\Logo;
use App\modelsAdmin\StaticData;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StaticDataController extends Controller
{

    /**
     * The name of the view folder.
     *
     * @var string
     */
    const FOLDER = "admin.static_data.";

    /**
     * The name of the Route.
     *
     * @var string
     */
    const ROUTE = "/admin/static-data";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * The name of the Upload Folder.
     *
     * @var string
     */
    const UPLOAD_FOLDER = "static_data";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StaticData::first();
        $route = self::ROUTE;
        return view(self::FOLDER."create", compact("data", "route"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'about_text' => 'required',
            'image' => 'mimes:jpeg,jpg,png,jfif',
        ]);

        $staticData = null == $request->id ? new StaticData() : StaticData::find($request->id);
        if(null != $request->main_banner) {
            $file = Storage::putFile(self::UPLOAD_FOLDER, new File($request->main_banner), 'public');
            $staticData->main_banner = $file;
        }
        $logos = [];
        $allowedfileExtension = ['jpg', 'png', 'jpeg', 'jfif'];
        if(null != $request->logos)
            foreach ($request->logos as $image) {
                if(in_array($image->getClientOriginalExtension(), $allowedfileExtension)) {
                    $image = Storage::putFile(self::UPLOAD_FOLDER, new File($image), 'public');
                    $logos[]["image"] = $image;
                }
            }
        $staticData->about_text = $request->about_text;
        $staticData->save();
        if(!empty($logos)) {
            DB::table('logos')->insert($logos);
        }
        return redirect(self::ROUTE);
    }
}
