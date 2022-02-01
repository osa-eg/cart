<?php

namespace App\Models;

use App\Traits\LangVal;
use App\Traits\RetrieveMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model implements HasMedia
{
    use HasFactory, HasSlug , InteractsWithMedia, RetrieveMedia, LangVal;

    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * @var string[]
     */
    protected $casts =[
        'active'=>'boolean',
        'qty'=>'integer',
    ];

    /**
     * @param \Spatie\MediaLibrary\MediaCollections\Models\Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(500)
            ->sharpen(10)
            ->nonQueued();
    }

    /**
     * @param $q
     * @return mixed
     */
    public function scopeActive($q)
    {
        return $q->where('active',1);
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





}
