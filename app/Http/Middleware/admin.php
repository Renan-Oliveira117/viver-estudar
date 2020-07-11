<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class admin
{
    
    public function handle($request, Closure $next)
    {
        if(auth()->user()->tipo != 1){
            abort(403,'Acesso não Autorizado');
        }

        return $next($request);
    }
    
}
