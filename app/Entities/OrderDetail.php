<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class OrderDetail.
 *
 * @package namespace App\Entities;
 */
class OrderDetail extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'menu_item_id', 'amount', 'hot', 'ice', 'sugar', 'remarks', 'user_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function item()
    {
        return $this->belongsTo(MenuItem::class, 'menu_item_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
