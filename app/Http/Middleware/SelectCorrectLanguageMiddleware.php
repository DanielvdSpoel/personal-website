<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SelectCorrectLanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $englishDomains = explode(',', config('app.english_domains'));
        $dutchDomains = explode(',', config('app.dutch_domains'));

        if (in_array($request->getHttpHost(), $englishDomains)) {
            app()->setLocale('en');
        } elseif (in_array($request->getHttpHost(), $dutchDomains)) {
            app()->setLocale('nl');
        }
        return $next($request);
    }
}
