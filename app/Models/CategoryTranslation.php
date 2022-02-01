<?php

namespace App\Models;


class CategoryTranslation extends BaseTranslation
{
    public $timestamps = false;
    protected $fillable = ['name', 'slug'];

}
