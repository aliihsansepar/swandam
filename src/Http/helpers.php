<?php

if (!function_exists('panel')) {
    function panel($route)
    {
        return route('swandam' . $route);
    }
}