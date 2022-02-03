<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'category'=> $this->category->name,
            'name'=> $this->name,
            'slug'=> $this->slug,
            'description'=> $this->description,
            'price'=> $this->price,
            'qty'=> $this->qty,
            'image'=> $this->thumb,
        ];
    }
}
