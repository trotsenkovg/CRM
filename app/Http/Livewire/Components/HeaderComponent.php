<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\App;
use Livewire\Component;

class HeaderComponent extends Component
{
    public function setLocale($locale)
    {
        if (!in_array($locale, config('app.available_locales'))) {
            abort(404);
        }

        App::setLocale($locale);
        // Session
        session()->put('locale', $locale);

        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('partials.header');
    }
}
