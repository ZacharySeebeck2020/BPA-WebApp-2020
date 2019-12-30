<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    /**
     * Retrieve all products from this category.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * If the category has a parent return the parent. If not, return false.
     */
    public function hasParent() {
        return $this;
    }
}
