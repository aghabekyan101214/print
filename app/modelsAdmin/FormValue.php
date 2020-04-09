<?php

namespace App\modelsAdmin;

use Illuminate\Database\Eloquent\Model;

class FormValue extends Model
{
    protected $table = "form_values";

    public function form()
    {
        return $this->belongsTo("App\modelsAdmin\Form", "form_id", "id");
    }

    public function values()
    {
        return $this->hasMany("App\modelsAdmin\FormValue", "form_id", "id");
    }
}
