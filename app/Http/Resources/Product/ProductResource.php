<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'name' => $this->name, //odredjuje sta se prikazuje u api-ju i menja key (npr price se zove my price)  (transformer)
            'description' => $this->detail,
            'my price' => $this->price,
            'stock' => $this->stock,
            'discount' => $this->discount
        ];
    }
}
