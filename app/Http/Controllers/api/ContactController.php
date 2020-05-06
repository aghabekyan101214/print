<?php

namespace App\Http\Controllers\api;

use App\helpers\FileUploadHelper;
use App\helpers\ResponseHelper;
use App\modelsAdmin\Contact;
use App\modelsAdmin\ProductPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    const UPLOAD_FOLDER = "contact";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'full_name' => 'max:191',
            'company_name' => 'max:191',
            'phone' => 'max:191|required',
            'email' => 'max:191|required|email',
            'comment' => 'max:3000',
        ];

        $messages = [
            'email' => "The Email Field Must Be Filled In Correctly"
        ];

        $validator = Validator::make($request->all(),$rules, $messages);
        if ($validator->fails()) {
            return ResponseHelper::fail($validator->errors()->first(), 422);
        }
        DB::beginTransaction();

        $contact = new Contact();
        $contact->full_name = $request->full_name;
        $contact->company_name = $request->company_name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->comment = $request->comment;
        if(null != $request->combination_id){
            $productPrice = ProductPrice::with(["product", "valuePrices.formValue"])->find($request->combination_id);
            $text = "<p>Product: $productPrice->product->name</p>";
            $text .= "<p>Price: $productPrice->price</p>";
            $text .= "<p>Forms:</p>";
            $text .= "<ul>";
            foreach ($productPrice->valuePrices as $val) {
                $text .= "<li>$val->formValue->name</li>";
            }
            $text .= "</ul>";
            $contact->comment .= "<br>" . $text;
        }
        $contact->save();
        if(null != $request->uploaded_files) {
            $files = FileUploadHelper::uploadMultiple($request->uploaded_files, ["*"], self::UPLOAD_FOLDER);
            if(!empty($files)) $contact->files()->createMany($files);
        }
        DB::commit();

        return ResponseHelper::success(array());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\modelsAdmin\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\modelsAdmin\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\modelsAdmin\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\modelsAdmin\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
