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

    /**
     * The Form 1 IDs.
     *
     * @var array
     */
    const FORM_1 = [1, 2, 3, 4, 5, 6];

    /**
     * The Form 2 IDs.
     *
     * @var array
     */
    const FORM_2 = [1, 3, 4, 5, 6, 7, 8];

    public function forms()
    {
        return $this->belongsToMany("App\modelsAdmin\Form", "products_forms", "product_id", "form_id");
    }

    public function images()
    {
        return $this->hasMany("App\modelsAdmin\ProductImage");
    }
}
