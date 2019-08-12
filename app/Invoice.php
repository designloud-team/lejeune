<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Invoice extends Model
{
    use SoftDeletes;
//    use Searchable;
    //
    protected $fillable = [
//        'registered_id',
        'borrower',
        'coborrower',
        'daytime_phone',
        'evening_phone',
        'signing_address',
        'property_address',
        'date',
        'time',
        'packages',
        'local',
        'notary_fee',
        'status',
    ];

    protected $hidden = [
        'job_id',
        'customer_id',
        'notary_id',
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
