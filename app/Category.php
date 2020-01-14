<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug'
    ];


    /**
     * Return a collection of all products connected to that category.
     *
     * @return Collection
     */
    public function Products() {
        return $this->hasMany('App\Product');
    }
}
