<?php

namespace App\modelsAdmin;

use Illuminate\Database\Eloquent\Model;

class BusinessService extends Model
{
    public function images()
    {
        return $this->hasMany("App\modelsAdmin\BusinessServiceImage");
    }
}
