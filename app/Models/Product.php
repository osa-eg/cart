<?php

namespace App\Models;

use App\Traits\LangVal;
use App\Traits\RetrieveMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Product extends BaseModel implements HasMedia , TranslatableContract
{
    use HasFactory , InteractsWithMedia, RetrieveMedia, LangVal, Translatable;

    /**
     * @var string[]
     */
    protected $guarded = ['id'];
    public $translatedAttributes = ['name','slug','description'];

    /**
     * @var string[]
     */
    protected $casts =[
        'active'=>'boolean',
        'qty'=>'integer',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }
    /**
     * @param \Spatie\MediaLibrary\MediaCollections\Models\Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(250)
            ->sharpen(10)
            ->nonQueued();
    }



    /**
     * @param $q
     * @return mixed
     */
    public function scopeFinished($q)
    {
        return $q->where('qty',0);
    }

    /**
     * for getting all about To Finish Products
     * @param $q
     * @return mixed
     */
    public function scopeAboutToFinish($q)
    {
        return $q->where('qty','>', 0)->where('qty','<=',config('settings.about_finish_limit',5));
    }


    public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function orders()
    {
        return $this->hasMany(OrderItem::class,'product_id');
    }

    public function getDeletableAttribute() :Bool
    {
        return !$this->orders()->count();
    }


}
