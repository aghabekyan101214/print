<?php

namespace App\Http\Controllers\api;
use App\helpers\FileUploadHelper;
use App\helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\modelsAdmin\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|max:191',
                'text' => 'required|max:3000',
                'image' => 'required|max:10240|image', //this is 10MB
            ]);
        if ($validator->fails()) {
            return ResponseHelper::fail($validator->errors()->first(), 422);
        }
        $image = FileUploadHelper::upload($request->image, "reviews");

        $review = new Review();
        $review->name = $request->name;
        $review->text = $request->text;
        $review->image = $image;
        $review->save();

        return ResponseHelper::success(array());
    }

    public function getReviews()
    {
        $reviews = Review::where(["approved" => 0])->orderBy("id", "DESC")->get();
        return ResponseHelper::success($reviews);
    }
}
