<?php
/**
 * User: sasik
 * Date: 3/2/16
 * Time: 10:21 PM
 */

namespace App\Http\Middleware;


use App\Models\User;
use Closure;

class LockDownloadCert
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
        return $this->user->getQuestionAnswered() ? $next($request) : redirect(url('/question'));
    }
}
