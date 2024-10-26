<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;
use App\Models\User;
use Exception;
Use Illuminate\Support\Facades\Auth;

class check_owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try{
        $user_id = Auth::user()->id;
        
        $user=User::findorFail($user_id);

        $posts =$user->posts()->findorFail($request->id);
        }
        catch(Exception $e){
            return response()->json('Error',403);;
        }
      
    //  return response()->json([$posts], 403);
       return $next($request);
    }
}
