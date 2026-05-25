<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Is_connected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function __construct(){}

    public function handle(Request $request, Closure $next)
    {
        if(!Session()->has('client_id')){
            Session()->put('old_route',$request->route()->uri);
            return Redirect::To("/connect")->with(['fail'=>'Veillez vous connecter s\'il vous plait!']);
        }
        return $next($request);
    }
}
