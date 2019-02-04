<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    //
    use Notifiable;
    use SoftDeletes;
//    use Searchable;
    //
    protected $fillable = [
        'company',
        'name',
        'phone_number',
        'mobile',
        'email',
        'display_name',
        'use_display_name',
        'website',
        'billing_address',
        'shipping_address',
        'user_id'
    ];

    protected $hidden = [];

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
