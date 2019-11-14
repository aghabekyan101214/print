<?php

namespace App\modelsAdmin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The names of Main Categories.
     *
     * @var array
     */
    const CATEGORIES = ["Print Products", "Signage/Banner"];

    public function forms()
    {
        return $this->belongsToMany("App\modelsAdmin\Form", "products_forms", "product_id", "form_id");
    }

    public function images()
    {
        return $this->hasMany("App\modelsAdmin\ProductImage");
    }
}
