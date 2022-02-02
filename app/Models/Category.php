<?php

namespace App\Models;

use App\Traits\LangVal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use HasFactory,
        Translatable,
        LangVal;
    protected $guarded = ['id'];
    public $translatedAttributes = ['name','slug'];
    protected $with = ['children'];


    public function parent() : BelongsTo
    {
        return $this->belongsTo(self::class,'parent_id');
    }


    public function children() : HasMany
    {
        return $this->hasMany(self::class,'parent_id');
    }


    /**
     * @param $q
     * @return mixed
     */
    public function scopeParents($q)
    {
        return $q->whereNull('parent_id');
    }

    /**
     * @param $q
     * @return mixed
     */
    public function scopeChildrens($q)
    {
        return $q->whereNotNull('parent_id');
    }


    public function products() : HasMany
    {
        return $this->hasMany(Product::class,'category_id');
    }


    public function getDeletableAttribute() :Bool
    {
        return !$this->products()->count();
    }


}
