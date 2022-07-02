<?php

namespace App\Models;

class CouponRedemption extends MongoModel
{
    protected $connection = 'mongodb';
    protected $table = 'coupon_redemptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'clientID',  //changes after sale
        'branchID',  //branch where coupon was sailed
        'couponID',
        'createdUser',
        'createdCompany',
        'saleType',
        'updatedUser',
        'redempted_at', //branch where coupon was sailed
        'status',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        '_id'
    ];

    public function users()
    {
        return $this->hasMany(CouponRedemption::class, '_id', 'redempted_by');
    }
}
