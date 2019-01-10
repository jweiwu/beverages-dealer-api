<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Menu.
 *
 * @package namespace App\Entities;
 */
class Menu extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'city_id', 'address', 'phone_number', 'description', 'condition', 'remarks', 'modifier_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function modifier()
    {
        return $this->belongsTo(User::class);
    }

    protected $dates = ['deleted_at'];

}