<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Test4Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = [
            ['name'=>'taro','mail'=>'taro@yamada'],
            ['name'=>'taro2','mail'=>'taro@yamada'],
            ['name'=>'taro3','mail'=>'taro@yamada'],
        ];
        $request->merge(['data'=>$data]);
        
        return $next($request);
    }

}
