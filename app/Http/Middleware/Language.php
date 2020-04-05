<?php

namespace App\Http\Middleware;

use Closure;

class Language
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
        if (auth()->check()) {

            $keyLanguage = array_search(auth()->user()->language, config('setting.language'));

            if (app()->getLocale() != $keyLanguage) {
                app()->setLocale($keyLanguage);
            }
        }

        return $next($request);
    }
}
