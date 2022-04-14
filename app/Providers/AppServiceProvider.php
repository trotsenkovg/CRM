<?php

namespace App\Providers;

use App\Models\CouponRedemption;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*$users = User::all();
        $users = $users->sortByDesc(function ($users) {
            return $users->getRedemptionsCountAttribute();
        });

        dd($users->toArray());
        dd('die');*/
        /*$users = User::get();
        foreach ($users as $user) {
            User::where('_id', $user->id)->update([
                'redemption_count' => $user->redemptions_count,
            ]);

            $user->save();
        }*/

    }
}
