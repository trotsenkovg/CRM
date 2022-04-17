<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Language;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\AddSiteUser;
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
    Route::get('/addSiteUser', AddSiteUser::class)
        ->name('addSiteUser');
    Route::get('/providerUsers', SiteUsers::class)
        ->name('providerUsers');
    Route::get('/addProviderUser', AddSiteUser::class)
        ->name('addProviderUser');
    Route::get('/chipperUsers', SiteUsers::class)
        ->name('chipperUsers');
    Route::get('/addChipperUser', AddSiteUser::class)
        ->name('addChipperUser');

    /**
     * Settings
     */
    Route::get('/accountSettings', AddSiteUser::class)
        ->name('accountSettings');

    /**
     * Logout
     */
    Route::get('logout', LogoutController::class)
        ->name('logout');

});
