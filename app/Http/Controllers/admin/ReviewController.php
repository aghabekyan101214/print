<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\modelsAdmin\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    const FOLDER = "admin.reviews.";

    const ROUTE = "/admin/reviews";

    const UPLOAD_FOLDER = "reviews";

    public function index()
    {
        $data = Review::orderBy("approved")->orderBy("id", "DESC")->get();
        $route = self::ROUTE;
        return view(self::FOLDER . "index", compact("data", "route"));

    }

    public function changeStatus($id)
    {
        $review = Review::find($id);
        $review->approved = ($review->approved == 0) ? 1 : 0;
        $review->save();

        return redirect(self::ROUTE);
    }

    public function destroy($id)
    {
        Review::find($id)->delete();
        return redirect(self::ROUTE);
    }

}
