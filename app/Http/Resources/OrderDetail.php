<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetail extends JsonResource
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
            'amount' => $this->amount,
            'hot' => $this->hot,
            'ice' => $this->ice,
            'sugar' => $this->sugar,
            'remarks' => $this->remarks,
            // 'order' => $this->order,
            'item' => $this->item,
            'user' => $this->user,
        ];
    }
}
