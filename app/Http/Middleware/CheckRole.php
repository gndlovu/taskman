<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $message = "You do not have sufficient permissions!";

        if (!$request->user())
        {
            if ($request->ajax())
            {
                echo json_encode(['status' => false, 'error_description' => $message]);
                exit();
            }

            return response($message, 401);
        }

        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if ($roles && $request->user()->hasAnyRole($roles))
        {
            return $next($request);
        }

        if ($request->ajax())
        {
            echo json_encode(['status' => false, 'error_description' => $message]);
            exit();
        }

        return response($message, 401);
    }
}
