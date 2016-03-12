<?php

namespace App\Http\Middleware;

use Closure;
use App\Content;

class CustomMiddleware
{

    private $socials;

    public function __construct()
    {
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
        $social = Content::where('title', 'Sosyal Medya')->first();
        $this->socials = $social!=NULL?$social->links()->get():NULL;

        view()->share('socials', $this->socials);

        return $next($request);
    }
}
