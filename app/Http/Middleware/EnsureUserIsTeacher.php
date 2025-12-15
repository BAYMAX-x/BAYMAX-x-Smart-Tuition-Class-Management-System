<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsTeacher
{
    /**
     * Ensure the authenticated user is marked as a teacher/admin.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user || !$user->is_teacher) {
            abort(403, 'Only teachers can register student accounts.');
        }

        return $next($request);
    }
}
