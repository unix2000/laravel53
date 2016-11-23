<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddle
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
        //前置操作
       if( 2 > 1 ) {
           echo '这是前置操作';
//            return redirect('one');
       }
        //return $next($request);
        $res = $next($request);
        dump($res);
        //后置操作
        echo '这是后置操作！！';
        exit(0);
    }
}
