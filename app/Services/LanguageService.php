<?php

namespace App\Services;

use Illuminate\Support\Facades\App;

class LanguageService
{
    public static function setAppLocaleFromSession()
    {
        if (session()->get('locale') !== null)
        {
            $locale = session()->get('locale');
            App::setLocale($locale);
        }
    }

}
