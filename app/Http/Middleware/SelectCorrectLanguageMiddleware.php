<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Url\Url;

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
        if ($request->getHost() !== config('domains.english_domain')) {
            $parts = explode('.', $request->getHost());
            $tld = array_pop($parts);

            $lang = config('domains.languages.' . $tld);
            dump($lang);
            if (!$lang) {
                $lang = config('app.fallback_locale');
            }
            dump(route($request->route()->getName(), ['language' => $lang], false));

            $newUrl = Url::fromString($request->url())
                ->withHost(config('domains.english_domain'))
                ->withPath(route($request->route()->getName(), ['language' => $lang], false));
            dd($newUrl);
            return redirect()->to($newUrl);
        }

        app()->setLocale($request->language);
        return $next($request);
    }
}
