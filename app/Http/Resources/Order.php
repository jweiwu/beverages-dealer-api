<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
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
            'contact_number' => $this->contact_number,
            'location' => $this->location,
            'arrive_at' => $this->arrive_at ? $this->arrive_at->diffForHumans() : '-',
            'deadline' => $this->deadline ? $this->deadline->diffForHumans() : '-',
            'limit_amount' => $this->limit_amount,
            'details' => $this->details,
            'menu' => $this->menu,
            'user' => $this->user,
            'comments' => $this->comments,
            'likes' => $this->likes,
        ];
    }
}
