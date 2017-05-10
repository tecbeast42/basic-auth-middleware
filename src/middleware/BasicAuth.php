<?php

namespace TecBeast\BasicAuthWithEnv\Middleware;

use Closure;
use TecBeast\BasicAuthWithEnv\Authenticator;

class BasicAuth
{
    protected $authenticator;

    public function __construct()
    {
        $this->authenticator = new Authenticator();
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
        $env = config('app.env', env('APP_ENV'));

        if (in_array($env, config('basic-auth.envs'))) {
            $this->authenticator->auth();
        }

        return $next($request);
    }
}
