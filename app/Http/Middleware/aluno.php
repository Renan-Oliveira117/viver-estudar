<?php

namespace App\Http\Middleware;

use Closure;

class aluno
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
        if(auth()->user()->tipo == 0){
            return redirect('admin/aluno');
        }

        return $next($request);
    }
}
