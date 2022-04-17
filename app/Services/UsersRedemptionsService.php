<?php

namespace App\Services;

use App\Models\UsersRedemptions;

class UsersRedemptionsService
{
    public static function getExportCollection()
    {
        return UsersRedemptions::all()
            ->map(function ($user) {
                $user->status = $user->status ? __('users.active') : __('users.notActive');
                return $user;
            });
    }
}
