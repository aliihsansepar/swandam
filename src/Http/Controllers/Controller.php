<?php

namespace Swandam\Core\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct()
    {
        if (!session()->has('panel.language')) {
            session('panel.language', 'tr');
        }
    }
}
