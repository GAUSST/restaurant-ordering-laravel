<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class Is_admin
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
        if(Session()->has("client_id")){
            $auth_user_id = Session()->get("client_id");
            $client   = Client::where('id','=',$auth_user_id)->first();
            if ($client->admin == 1)
                 return $next($request);
            else
                return abort(403,"Page Interdite");
        }else{
            Session()->put('old_route',$request->route()->uri);
            return Redirect::To("/connect")->with('fail','Veillez vous connecter s\'il vous plait!');
        }
    }
}
