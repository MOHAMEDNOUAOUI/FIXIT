<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Client;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            $client = Client::where('user_id', $user->id)->first();
            $Admin = Admin::where('user_id' , $user->id)->first();
            if ($client) {
                return $next($request);
            }
            elseif($Admin) {
                return redirect()->intended('Admin');
            }
            else{
                return redirect()->intended('Depanneur');
            }
        }

        return redirect()->route('HOME');
    }
}
