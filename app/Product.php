<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    /**
     * Связь с таблицей `product_categories`
     */
	public function category()
    {
        return $this->belongsTo('App\ProductCategory', 'category_id');
    }

    /**
     * Связь с таблицей `product_manufacturers`
     */
	public function manufacturer()
    {
        return $this->belongsTo('App\ProductManufacturer', 'manufacturer_id');
    }

    /**
     * Связь с таблицей `product_providers`
     */
	public function provider()
    {
        return $this->belongsTo('App\ProductProvider', 'provider_id');
    }

    /**
     * Связь с таблицей `product_images`
     */
    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

}
