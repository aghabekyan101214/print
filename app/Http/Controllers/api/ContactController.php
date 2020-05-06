<?php

namespace App\Http\Controllers\api;

use App\helpers\FileUploadHelper;
use App\helpers\ResponseHelper;
use App\modelsAdmin\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'full_name' => 'max:191',
            'company_name' => 'max:191',
            'phone' => 'max:191',
            'email' => 'max:191',
            'comment' => 'max:3000',
        ]);
        DB::beginTransaction();

        $contact = new Contact();
        $contact->full_name = $request->full_name;
        $contact->company_name = $request->company_name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->comment = $request->comment;

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
