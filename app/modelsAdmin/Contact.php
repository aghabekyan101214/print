<?php

namespace App\modelsAdmin;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function files()
    {
        return $this->hasMany("App\modelsAdmin\ContactFile", "contact_id", "id");
    }
}
