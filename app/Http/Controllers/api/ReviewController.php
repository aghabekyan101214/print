<?php

namespace App\Http\Controllers\api;
use App\helpers\FileUploadHelper;
use App\helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\modelsAdmin\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $rules = [
            'name' => 'required|max:191',
            'text' => 'required|max:175',
            'image' => 'max:10240' .((null != $request->image) ? "|image" : "") //this is 10MB
        ];
        $messages = [
            'name.required' => 'Name or Company Name is required',
            'text.required' => 'Review message is required',
            'image.max' => 'Image Maximum Size is 10 mb',
            'image.image' => 'Please, Use Valid Image Extension',
        ];

        $validator = Validator::make($request->all(),$rules, $messages);
        if ($validator->fails()) {
            return ResponseHelper::fail($validator->errors()->first(), 422);
        }
        if(null != $request->image) {
            $image = FileUploadHelper::upload($request->image, "reviews");
        }

        $review = new Review();
        $review->name = $request->name;
        $review->text = $request->text;
        $review->image = $image ?? null;
        $review->save();

        return ResponseHelper::success(array());
    }

    public function getReviews()
    {
        $base = URL::to("/");
        $reviews = Review::selectRaw("id, name, text, concat('".$base."', '/uploads/', image) as image")->where(["approved" => 1])->orderBy("id", "DESC")->get();
        return ResponseHelper::success($reviews);
    }
}
