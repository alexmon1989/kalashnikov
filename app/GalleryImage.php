<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model {

    /**
     * Отношение с таблицей gallery_categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\GalleryCategory', 'category_id');
    }

}
