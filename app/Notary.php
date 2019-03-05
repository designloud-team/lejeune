<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Notary extends Model
{

    use Notifiable;
    use SoftDeletes;
//    use Searchable;
    //
    protected $fillable = [
        'local',
        'state',
        'first_name',
        'last_name',
        'business_name',
        'mailing_address',
        'delivery_address',
        'email',
        'phone',
        'alternate_phone',
        'fax',
        'website',
        'e_docs',
        'insurance',
        'insurance_amount',
        'ssn_or_ein',
        'notes'
    ];

    protected $hidden = [];
    protected $table = 'notaries';

    protected $dates = ['deleted_at'];

    /**
     * The notes that belong to the user.
     */
    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
    public function reports()
    {
        return $this->hasMany('App\Report');
    }

    public function routeNotificationForMail()
    {
        return $this->email;
    }
    public static function searchable(): array
    {
        return ['organization', 'first_name','last_name'];
    }
}
