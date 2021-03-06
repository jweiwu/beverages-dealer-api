<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Menu extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'description' => $this->description,
            'condition' => $this->condition,
            'remarks' => $this->remarks,
            'updated_at' => $this->updated_at->diffForHumans(),
            'modifier' => $this->modifier,
            'city' => $this->city,
            'items' => $this->items,
            'comments' => $this->comments,
            'likes' => $this->likes,
        ];
    }
}
