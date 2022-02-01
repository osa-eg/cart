<?php

namespace App\Traits;



Trait LangVal
{
    /**
     *-------------------------------------------------
     * This trait is responsible for getting Currant Language value of translated columns of the translatable model.
     * ------------------------------------------------
     */

    public function getNameAttribute() :string
    {
        return $this->translateOrDefault(app()->getLocale())->name??$this->translateOrDefault(config('app.locale','en'))->name??'';
    }

    public function getSlugAttribute() :string
    {
        return $this->translateOrDefault(app()->getLocale())->slug??$this->translateOrDefault(config('app.locale','en'))->slug??'';
    }

    public function getDescriptionAttribute() :string
    {
        return $this->translateOrDefault(app()->getLocale())->description??$this->translateOrDefault(config('app.locale','en'))->description??'';

    }


}
