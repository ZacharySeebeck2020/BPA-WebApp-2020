<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    /**
     * Retrieve the category of the product.
     */
    public function category()
    {
        $category = Category::where('id', $this->category_id)->first();

        return $category;
    }

}
