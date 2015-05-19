<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model {

    protected $fillable = ['title', 'file_name', 'description', 'parent_id', 'enabled'];

    public function childCategories()
    {
        return $this->hasMany('App\ProductCategory', 'parent_id');
    }

    public function parentCategory()
    {
        return $this->belongsTo('App\ProductCategory', 'parent_id');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'category_id');
    }

}
