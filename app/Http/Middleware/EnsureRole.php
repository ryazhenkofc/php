<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRole
{
    /**
     * @param  string  $role  Expected User::ROLE_* value (e.g. user, admin)
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();
        if (! $user || $user->role !== $role) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
