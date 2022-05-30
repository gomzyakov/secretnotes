<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * @param $lang
     *
     * @return RedirectResponse
     */
    public function switchLang($lang): RedirectResponse
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('locale', $lang);
        }

        return Redirect::back();
    }
}
