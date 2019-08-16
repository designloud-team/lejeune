<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    //
    use SoftDeletes;
//    use Searchable;
    //
    protected $fillable = [
        'is_completed',
        'tracking',
        'courier',
        'completion_date',
        'shipping_date',
        'explanation',
        'customer_id',
        'notary_id',
        'job_id',
        'user_id'
    ];

    protected $hidden = [
        'customer_id',
        'notary_id',
        'job_id',
        'user_id'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The notes that belong to the user.
     */
    public function notaries()
    {
        return $this->belongsTo('App\Notary');
    }

    public function customers()
    {
        return $this->belongsTo('App\Customer');
    }
    public function jobs()
    {
        return $this->belongsTo('App\Job');
    }

    public static function searchable(): array
    {
//        return ['organization', 'first_name','last_name'];
    }
}
