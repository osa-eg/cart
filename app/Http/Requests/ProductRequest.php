<?php

namespace App\Http\Requests;

use App\Rules\UniqeInTranslations;
use App\Rules\UniqueInTranslations;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            '%name%'=>['sometimes','required', 'string', 'max:150',new UniqeInTranslations('product_translations','product_id',$this?->product->id??null )],
            '%description%'=>['sometimes','required', 'string'],
        ]);

        $main = [
            'category_id'   => ['required','integer', 'exists:categories,id'],
            'price'         => ['required', 'numeric', 'min:1', 'max:9999'],
            'qty'           => ['required', 'numeric', 'min:1', 'max:9999'],
            'images'        => [($this?->product)?'nullable':'required','array','min:1'],
            'images.*'      =>[($this?->product)?'nullable':'required','file', 'mimes:jpeg,jpg,png,gif','max:2000'],
        ];

        return array_merge($translations , $main);
    }
}
