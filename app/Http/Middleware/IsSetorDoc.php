<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSetorDoc
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
        if(Auth::user()->user_type == 'Setor de documentos'){
            $request->status = 'Trocar cartão SUS';
            $request->next_step = 'Liberar para agendamento';
        }

        return $next($request);
    }
}
