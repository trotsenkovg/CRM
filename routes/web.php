<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Language;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\SiteUsers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');
});

Route::middleware('auth')->group(function () {
    /**
     * Dashboard
     */
    Route::get('/', Dashboard::class)
        ->name('dashboard');
    Route::get('/dashboard', Dashboard::class)
        ->name('dashboard');

    /**
     * Users
     */
    Route::get('/siteUsers', SiteUsers::class)
        ->name('siteUsers');

    Route::get('logout', LogoutController::class)
        ->name('logout');
});

Route::get('/setLanguage/{locale}', function ($locale) {
    if (!in_array($locale, config('app.available_locales'))) {
        abort(404);
    }

    App::setLocale($locale);
    // Session
    session()->put('locale', $locale);

    return redirect()->back();
})->name('setLanguage');
