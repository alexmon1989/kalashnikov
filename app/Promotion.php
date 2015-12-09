<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model {

    protected $fillable = array('title',
        'full_text',
        'preview_text',
        'thumbnail',
        'enabled'
    );

}
