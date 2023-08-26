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
        //Check if request is to danielvdspoel.com

        //if no, check what tld is used

        //check which languages is used for that tld

        //redirect to danielvdspoel.com with the correct language

        if ($request->getHost() !== config('domains.english_domain')) {
            $parts = explode('.', $request->getHost());
            $tld = array_pop($parts);

            $lang = config('domains.languages.' . $tld);
            $newUrl = Url::fromString($request->url())
                ->withHost(config('domains.english_domain'));
            dump($lang);
            dump($newUrl);
        }



//        $url = Url::fromString($request->url());
//
//        if ($url->getHost() !== config('domains.english_domain')) {
//            $tld = explode('.', $url->getHost());
//            $language = config('domains.languages.' . $url->getHost());
//            dd($language);
//
//            $redirect_domains = explode(',', config('app.redirect_domains'));
//            if (in_array($request->getHost(), $redirect_domains)) {
//                return redirect(route('home', ['language' => 'nl']));
//            }
//        }



        app()->setLocale($request->language);
        return $next($request);
    }
}
