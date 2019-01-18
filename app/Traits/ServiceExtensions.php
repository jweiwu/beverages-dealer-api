<?php

namespace App\Traits;

trait ServiceExtensions
{
    // input: api/menus/1/comments
    // output: 'App\Entities\Menu'
    public function parsePath(string $path)
    {
        $typeCodes = [
            'menus' => 'App\Entities\Menu',
            'orders' => 'App\Entities\Order',
        ];
        $key = explode('/', $path)[1];
        $value = $typeCodes[$key];
        return $value;
    }
}
