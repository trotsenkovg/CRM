<?php

namespace App\Models;

class UsersRedemptions extends MongoModel
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
