<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];


    /**
     * Get the category the product is assigned to.
     *
     * @return App\Category
     */
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
