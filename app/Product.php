<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * Retrieve the category of the product.
     */
    public function category()
    {
        return $this->hasOne('App\Category');
    }

}
