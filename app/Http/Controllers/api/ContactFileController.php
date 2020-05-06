<?php

namespace App\Http\Controllers\api;

use App\modelsAdmin\Contact;
use App\modelsAdmin\ContactFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactFileController extends Controller
{
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\modelsAdmin\ContactFile  $contactFile
     * @return \Illuminate\Http\Response
     */
    public function show(ContactFile $contactFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\modelsAdmin\ContactFile  $contactFile
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactFile $contactFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\modelsAdmin\ContactFile  $contactFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactFile $contactFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\modelsAdmin\ContactFile  $contactFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactFile $contactFile)
    {
        //
    }
}
