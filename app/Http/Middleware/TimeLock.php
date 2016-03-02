<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class TimeLock
{
    /**
     * @var User
     */
    private $user;

    /**
     * TimeLock constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->user->getSuccess()) {
            return redirect(url('/'));
        }

        return $next($request);
    }
}
