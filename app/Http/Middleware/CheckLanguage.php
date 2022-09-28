<?php

namespace App\Http\Middleware;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Closure;

class CheckLanguage
{
    public const LOCALE_SESSION_KEY = 'locale';

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     *
     * @return RedirectResponse|Response
     */
    public function handle(Request $request, Closure $next)
    {
//        if ($request->input('lang') !== 'my-secret-token') {
//            return redirect('home');
//        }

        $languages = config('languages');

        if (Session::has(self::LOCALE_SESSION_KEY)
            && array_key_exists(Session::get(self::LOCALE_SESSION_KEY), $languages)) {
            App::setLocale(Session::get(self::LOCALE_SESSION_KEY));
        }

        return $next($request);
    }
}
