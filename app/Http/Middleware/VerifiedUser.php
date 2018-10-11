<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use App\User;

class VerifiedUser
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
        $verified = JWTAuth::parseToken()->toUser();
        if($verified->verified !== 1) {
            return response()->json([
                'notVerified' => 'Your account is not verified'
            ], 401);
        }

        return $next($request);
    }
}
