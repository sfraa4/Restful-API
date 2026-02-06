<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class score extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'scores';
    protected $guarded = [];
}
