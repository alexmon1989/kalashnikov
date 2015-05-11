<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model {

    /**
     * Отношение с таблицей gallery_images
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\GalleryImage', 'category_id');
    }

}
