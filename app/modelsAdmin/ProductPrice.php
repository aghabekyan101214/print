<?php

namespace App\modelsAdmin;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    public function valuePrices()
    {
        return $this->hasMany("App\modelsAdmin\FormValuePrice", "product_price_id", "id");
    }
}
