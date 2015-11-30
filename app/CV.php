<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    protected $table = 'cvs';

    protected $fillable = ['data_json'];
}
