<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if($request->header(['user-agent'][0]) != 'Symfony' && ($request->method() == 'POST' || $request->method() == 'PUT')  && $request->getContentTypeFormat() !== 'json'){
            throw  new \Exception("Posted data type must be Json");
        }

        return $next($request);
    }
}
