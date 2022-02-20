<?php

namespace Swandam\Core\Http\Middleware;

use Closure;

class AfterMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (config('swandam.minify.html')) {
            $content = $response->getContent([]);
            $content = preg_replace('/[^:"\'=]\/\/(.+)\n/m', '', $content);
            $content = preg_replace('/<!--(.+)-->/m', '', $content);
            $content = preg_replace('!/\*.*?\*/!s', '', $content);
            $content = preg_replace('/\n\s*\n/', "\n", $content);
            $content = str_replace(array("\r\n", "\r", "\n"), "", $content);

            $content = preg_replace('/\t+/i', ' ', $content);
            $content = preg_replace('/\s+/i', ' ', $content);
            $content = preg_replace('/(\>)\s*(\<)/m', '$1$2', $content);
            $content = preg_replace('/\s+/', ' ', $content);
            $response->setContent($content);
        }
        return $response;
    }
}