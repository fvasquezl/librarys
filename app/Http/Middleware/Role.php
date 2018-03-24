<?php

namespace App\Http\Middleware;

use Closure;

class Role
{

    protected $hierarchy = [
        'level1' => 1,
        'level2' => 2,
        'level3' => 3,
        'level4' => 4,
        'level5' => 5,
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = auth()->user();
        if ($this->hierarchy[$user->area->accessLevel] < $this->hierarchy[$role]){
            abort(404);
        }
        return $next($request);
    }
}
