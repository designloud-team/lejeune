<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
//    use Searchable;
    //
    protected $fillable = [
        'type',
        'is_business',
        'name',
        'company',
        'phone',
        'service_address',
        'service_date',
        'service_time',
        'people',
        'packages',
        'service',
        'comment'
    ];

    protected $hidden = [
        'user_id'
    ];

    protected $dates = ['deleted_at'];

    public static function searchable(): array
    {
        return [];
    }
}
