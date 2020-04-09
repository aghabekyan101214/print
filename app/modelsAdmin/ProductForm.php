<?php

namespace App\modelsAdmin;

use Illuminate\Database\Eloquent\Model;

class ProductForm extends Model
{
    protected $table = "products_forms";

    public function product()
    {
        return $this->belongsTo("App\modelsAdmin\Product", "product_id", "id");
    }

    public function form()
    {
        return $this->belongsTo("App\modelsAdmin\Form", "form_id", "id");
    }

    public function values()
    {
        return $this->hasMany("App\modelsAdmin\FormValue", "product_form_id", "id");
    }
}
