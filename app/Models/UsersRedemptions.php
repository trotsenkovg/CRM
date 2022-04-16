<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class UsersRedemptions extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'users_redemptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'clientID',
        'name',
        'email',
        'phone',
        'redemptions',
        'status',
    ];

    protected $hidden = ['_id'];
}
