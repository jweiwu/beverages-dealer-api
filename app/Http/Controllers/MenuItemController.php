<?php

namespace App\Http\Controllers;

class MenuItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

}
