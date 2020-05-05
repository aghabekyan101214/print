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
    const CATEGORIES = ["Print Products", "Signage/Banner", "Apparel Branding"];

    /**
     * The Form 1 IDs.
     *
     * @var array
     */
    const FORM_1 = [1, 2, 3, 4, 5, 6, 10];

    /**
     * The Form 2 IDs.
     *
     * @var array
     */
    const FORM_2 = [7, 2, 8, 9, 5, 4, 6, 10];

    public function forms()
    {
        return $this->belongsToMany("App\modelsAdmin\Form", "products_forms", "product_id", "form_id");
    }

    public function images()
    {
        return $this->hasMany("App\modelsAdmin\ProductImage");
    }

    public function productForms()
    {
        return $this->hasMany("App\modelsAdmin\ProductForm", "product_id", "id");
    }

    public function prices()
    {
        return $this->hasMany("App\modelsAdmin\ProductPrice", "product_id", "id");
    }
}
