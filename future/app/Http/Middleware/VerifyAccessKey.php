<?php

namespace future\Http\Middleware;

use Closure;

class VerifyAccessKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $key = $request->headers->get('api_key');

        if(!$request->is('api/*')){
            return $next($request);
        }else{
            if (isset($key) == env('API_KEY')) {
                return $next($request);
            } else {
                return response()->json(['error' => 'unauthorized' ], 401);
            }
        }


    }
}
