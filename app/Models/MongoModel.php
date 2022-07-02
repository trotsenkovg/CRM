<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

abstract class MongoModel extends Model
{
    protected $connection;
    protected $table;
    protected $fillable;
}
