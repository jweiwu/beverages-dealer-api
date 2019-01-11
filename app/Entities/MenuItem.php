<?php

namespace App\Entities;

use App\Entities\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class MenuItem.
 *
 * @package namespace App\Entities;
 */
class MenuItem extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['menu_id', 'category', 'product', 'price', 'hot_drink', 'adjust_ice', 'adjust_sugar', 'remarks'];

    protected $dates = ['deleted_at'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

}
