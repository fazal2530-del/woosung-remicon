<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = Session::get('locale', config('app.locale', 'ko'));

        if (in_array($locale, config('app.available_locales', ['ko', 'en']))) {
            App::setLocale($locale);
        } else {
            App::setLocale('ko');
        }

        return $next($request);
    }
}
