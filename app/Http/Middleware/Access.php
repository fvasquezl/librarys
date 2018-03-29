<?php

namespace App\Http\Middleware;

use Closure;

class Access
{

    protected $hierarchy = [
        'nivel1' => 1,
        'nivel2' => 2,
        'nivel3' => 3,
        'nivel4' => 4,
        'nivel5' => 5,
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $level)
    {
        $user = auth()->user();
        if ($this->hierarchy[$user->area->access->name] < $this->hierarchy[$level]){
            abort(404);
        }
        return $next($request);
    }
}
