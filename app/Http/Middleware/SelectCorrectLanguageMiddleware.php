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
        $redirect_domains = explode(',', config('app.redirect_domains'));
        if (in_array($request->getHost(), $redirect_domains)) {
            return redirect(route('home', ['language' => 'nl']));
        }

        app()->setLocale($request->language);
        return $next($request);
    }
}
