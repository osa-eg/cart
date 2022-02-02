<?php

namespace App\Traits;



Trait RetrieveMedia
{
    /**
     *-------------------------------------------------
     * This trait is responsible for getting images and its resized copies which has generated in the model by Media Collections.
     * ------------------------------------------------
     */

    public function getImageAttribute() :string
    {
        $media = $this->getFirstMedia('images');
        $url = ($media)?$media->getUrl(): '';
        return $url;
    }

    public function getThumbAttribute() :string
    {
        $media = $this->getFirstMedia('images');
        $url = ($media)?$media->getUrl('thumb'): '';
        return $url;
    }




}
