<?php

namespace App\Http\Middleware;

use App\Models\Depanneur;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DepanneurMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            $user = Auth::user();

            $Depanneur = Depanneur::where('user_id' , $user->id)->first();
            if($Depanneur){
                return $next($request);
            }
        }
        
        return redirect()->route('HOME');
    }
}
