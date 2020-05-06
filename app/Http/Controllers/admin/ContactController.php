<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\modelsAdmin\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    const FOLDER = "admin.contact."; //View Folder Path

    const ROUTE = "/admin/contact"; // Curent Resource Route

    const TITLE = "Contact"; // Curent Resource Route

    public function index()
    {
        $data = Contact::orderBy("id", "DESC")->get();
        $route = self::ROUTE;
        $title = self::TITLE;
        return view(self::FOLDER."index", compact("data", "route", "title"));
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect(self::ROUTE);
    }
}
