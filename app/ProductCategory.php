<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model {

    public function categories()
    {
        return $this->hasMany('App\ProductCategory', 'parent_id');
    }

    public function category()
    {
        return $this->belongsTo('App\ProductCategory', 'parent_id');
    }


}
