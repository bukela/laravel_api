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
            'name' => strtoupper($this->name), //odredjuje sta se prikazuje u api-ju i menja key (npr price se zove my price)  (transformer)
            'description' => $this->detail,
            'my price' => $this->price,
            'stock' => $this->stock == 0 ? 'Out of stock' : $this->stock,
            'discount' => $this->discount.' %',
            'totalPrice' => round((1 - ($this->discount/100)) * $this->price, 2),
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count()) : 'No rating',
            'href' => [
                'reviews' => route('reviews.index', $this->id) //review ruta, pogledati rute sa pha route:list
            ]
        ];
    }
}
