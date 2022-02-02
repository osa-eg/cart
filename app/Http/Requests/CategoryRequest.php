<?php

namespace App\Http\Requests;

use App\Rules\UniqeInTranslations;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $translations = RuleFactory::make([
            '%name%'=>['sometimes','nullable', 'string', 'max:150',new UniqeInTranslations('category_translations','category_id',$this?->category?->id??null )],
        ]);
        $main = [
            'parent_id'     => ['sometimes','nullable','integer', 'exists:categories,id'],
         ];
        return array_merge($translations , $main);
    }
}
