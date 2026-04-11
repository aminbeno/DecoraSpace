<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * Set the application locale.
     *
     * @param string $locale
     * @return RedirectResponse
     */
    public function setLocale(string $locale): RedirectResponse
    {
        if (in_array($locale, ['fr', 'ar', 'en'])) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
}
