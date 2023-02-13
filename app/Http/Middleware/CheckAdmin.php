<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        echo "chech admin route";
     return $next($request);
        // // dd ($request->all());
        // // $user = $request->user();
        // // if ($user->isAdmin()) {
        // //     return $next($request);
        // // }else{
        // //     echo"you are not allowed to acces:";
        // // }
        //       $path= $request->path();

        if(auth::checkCredential()){
            if(auth::user()->roleid == '1'){
                return $next($request);
            }
            else{
                return redirect('/admin')->with('status','Acess denied you are not admin');

            }
        }
        else{
            return redirect('/admin')->with('status','Please login first');
        }


    }
}
