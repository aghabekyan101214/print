<?php

namespace App\modelsAdmin;

use Illuminate\Database\Eloquent\Model;

class FormValuePrice extends Model
{
    protected $guarded = [];

    public function formValue()
    {
        return $this->belongsTo("App\modelsAdmin\FormValue", "form_value_id", "id");
    }
}
