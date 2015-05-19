<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProvider extends Model {

    public function products()
    {
        return $this->hasMany('App\Product', 'provider_id');
    }

}
