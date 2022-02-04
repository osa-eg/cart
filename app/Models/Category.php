<?php

namespace App\Models;

use App\Traits\LangVal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends BaseModel implements TranslatableContract
{
    use HasFactory,
        Translatable,
        LangVal;
    protected $guarded = ['id'];
    public $translatedAttributes = ['name','slug'];
    public $timestamps = false;
    protected $casts = [
      'active'=>'boolean'
    ];


    public function parent() : BelongsTo
    {
        return $this->belongsTo(self::class,'parent_id');
    }


    public function children() : HasMany
    {
        return $this->hasMany(self::class,'parent_id');
    }

    public function children_products()
    {
        return $this->hasManyThrough(Product::class,self::class,'parent_id','category_id');
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


    public function getAllColumnsAttribute() : array
    {
        return array_values(\Schema::getColumnListing($this->tableName()));
    }

    public function getDeletableAttribute() :Bool
    {
        return !($this->children()->count() || $this->products()->count());
    }



}
