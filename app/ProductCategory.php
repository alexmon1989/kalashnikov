<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model {

    public function childCategories()
    {
        return $this->hasMany('App\ProductCategory', 'parent_id');
    }

    public function parentCategory()
    {
        return $this->belongsTo('App\ProductCategory', 'parent_id');
    }


}
