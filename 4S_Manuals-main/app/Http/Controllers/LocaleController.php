<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function changeLocale($language_slug, Request $request)
    {
        // Allowed languages
        $allowed_languages = array('nl','en');

        if( in_array($language_slug, $allowed_languages) )
        {
            $request->session()->put('locale', $language_slug);
        }

        return redirect()->route('home');
    }
    /* public function changeLocale(Request $request)
    {

        $this->validate($request, ['locale' => 'required|in:nl,en']);

        \Session::put('locale', $request->locale);

        return redirect()->back();
    } */
}
