<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
//    use Searchable;
    //
    protected $fillable = [
        'registered_id',
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
        'customer_id',
        'notary_id',
        'user_id'

    ];

    protected $hidden = [
        'customer_id',
        'notary_id',
        'user_id'
    ];

    protected $dates = ['deleted_at'];
    public static function boot() {
        Job::creating(function($model)
        {

            $job = Job::all();

            $year = date('Y').'-';

            if($job->count()>0)

                $id = $job->last()->registered_id;
            else
                $id = 0;


            $rid = str_replace($year, '', $id);

            $val = intval($rid);
            $val++;

            $model->registered_id =  $year.$val;
        });
    }
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
    public function reports()
    {
        return $this->hasOne('App\Report');
    }

    public static function searchable(): array
    {
//        return ['organization', 'first_name','last_name'];
    }


}
