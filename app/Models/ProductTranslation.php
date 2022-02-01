<?php

namespace App\Models;


class ProductTranslation extends BaseTranslation
{
    public $timestamps = false;
    protected $fillable = ['name', 'slug' , 'description'];
}
