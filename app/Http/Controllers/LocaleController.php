<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LocaleController extends Controller
{
    public function changeLocale($language_slug, Request $request)
    {
        // Allowed languages
        $allowed_languages = ['nl', 'en'];

        if (in_array($language_slug, $allowed_languages)) {
            Session::put('locale', $language_slug);
            App::setLocale($language_slug);
        }

        // Redirect back to the previous page if possible, otherwise home
        return Redirect::back()->withInput() ?? redirect()->route('home');
    }
}
