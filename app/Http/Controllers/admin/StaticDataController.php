<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\modelsAdmin\BusinessService;
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
            'main_banner' => 'mimes:jpeg,jpg,png,jfif',
            'main_title' => 'required|max:255',
            'main_text' => 'required',
            'about_title' => 'required|max:255',
            'about_text' => 'required',

        ]);

        $staticData = null == $request->id ? new StaticData() : StaticData::find($request->id);
        if(null != $request->main_banner) {
            $file = Storage::putFile(self::UPLOAD_FOLDER, new File($request->main_banner), 'public');
            $staticData->main_banner = $file;
        }
        $staticData->main_title = $request->main_title;
        $staticData->main_text = $request->main_text;
        $staticData->about_title = $request->about_title;
        $staticData->about_text = $request->about_text;
        $staticData->save();
        return redirect(self::ROUTE);
    }
}
