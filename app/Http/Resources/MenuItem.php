<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category' => $this->category,
            'product' => $this->product,
            'price' => $this->price,
            'hot_drink' => $this->hot_drink,
            'adjust_ice' => $this->adjust_ice,
            'adjust_sugar' => $this->adjust_sugar,
            'remarks' => $this->remarks,
            'menu' => $this->menu,
        ];
    }
}
