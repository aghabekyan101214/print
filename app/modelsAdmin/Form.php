<?php

namespace App\modelsAdmin;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function products()
    {
        return $this->belongsToMany("App\modelsAdmin\Product", "products_forms", "form_id", "product_id");
    }
}
